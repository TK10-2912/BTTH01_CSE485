<?php
include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
            <form action="create_or_update_posts.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostTitle">Tiêu đề</span>
                    <input type="text" class="form-control" name="txtPostTitle">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostName">Tên bài hát</span>
                    <input type="text" class="form-control" name="txtPostName">
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
                            $selected = ($category['ma_tloai'] == '');
                                echo "<option value='{$category['ma_tloai']}' $selected>{$category['ten_tloai']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostSummary">Tóm tắt</span>
                    <input type="text" class="form-control" name="txtTomtat">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostContent">Nội dung</span>
                    <input type="text" class="form-control" name="txtnoidung">
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
                            $selected = ($author['ma_tgia'] =='');
                                echo "<option value='{$author['ma_tgia']}' $selected>{$author['ten_tgia']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostDate">Ngày viết</span>
                    <input type="date" class="form-control" name="txtPostDate" required>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblPostImg">Ảnh bài viết</span>
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-group  float-end ">
                    <input type="submit" value="Thêm" class="btn btn-success">
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