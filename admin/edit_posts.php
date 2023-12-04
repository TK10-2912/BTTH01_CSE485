<?php
@include("hearder.php");
if(isset($_GET['id']))
{
    $ma_bviet = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE ma_bviet=$ma_bviet";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $post = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else
header("Location: ./posts.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
            <form action="create_or_update_posts.php" method="post" enctype="multipart/form-data">
                <div style="display:none" class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostTitle">Mã bài viết</span>
                    <input type="text" class="form-control" name="txtPostId" value="<?=htmlspecialchars($ma_bviet)?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostTitle">Tiêu đề</span>
                    <input type="text" class="form-control" name="txtPostTitle"
                        value="<?=htmlspecialchars($post[0]['tieude'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostName">Tên bài hát</span>
                    <input type="text" class="form-control" name="txtPostName"
                        value="<?=htmlspecialchars($post[0]['ten_bhat'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostCat">Thể loại</span>
                    <select class="form-select" name="txtPostCat">
                        <?php
                            $sql = "SELECT * FROM theloai";
                            $statement = $connection->prepare($sql);
                            $statement->execute();
                            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                             foreach ($categories as $category) {
                            $selected = ($category['ma_tloai'] == $post[0]['ma_tloai']) ? 'selected' : '';
                                echo "<option value='{$category['ma_tloai']}' $selected>{$category['ten_tloai']}</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostSummary">Tóm tắt</span>
                    <input type="text" class="form-control" name="txtTomtat"
                        value="<?=htmlspecialchars($post[0]['tomtat'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostContent">Nội dung</span>
                    <input type="text" class="form-control" name="txtnoidung"
                        value="<?=htmlspecialchars($post[0]['noidung'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostAu">Tác giả</span>
                    <select class="form-select" name="txtPostAu">
                        <?php
                            $sql = "SELECT * FROM tacgia";
                            $statement = $connection->prepare($sql);
                            $statement->execute();
                            $authors = $statement->fetchAll(PDO::FETCH_ASSOC);
                             foreach ($authors as $author) {
                            $selected = ($author['ma_tgia'] == $post[0]['ma_tgia']) ? 'selected' : '';
                                echo "<option value='{$author['ma_tgia']}' $selected>{$author['ten_tgia']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostDate">Ngày viết</span>
                    <input type="date" class="form-control" name="txtPostDate" required
                        value="<?= date('Y-m-d', strtotime($post[0]['ngayviet'])) ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostImg">Ảnh bài viết</span>
                    <img src="uploads/<?=htmlspecialchars($post[0]['hinhanh'])?>"
                        alt="Hình ảnh của <?=htmlspecialchars($post[0]['tieude']) ?>" width="50">
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="posts.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
@include("footer.php");
?>
</body>

</html>
?>