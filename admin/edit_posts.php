<?php
@include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
            <form action="update_posts.php" method="post" enctype="multipart/form-data">
                <?php
                            if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM baiviet WHERE ma_bviet=$id";
                                    $statement = $connection->prepare($sql);
                                    $statement->execute();
                                    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                                }
                        ?>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Mã bài viết</span>
                    <input type="text" class="form-control" name="txtID"
                        value="<?=htmlspecialchars($id)?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tiêu đề</span>
                    <input type="text" class="form-control" name="txtTieude"
                        value="<?=htmlspecialchars($posts[0]['tieude'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tên bài hát</span>
                    <input type="text" class="form-control" name="txtTenbh"
                        value="<?=htmlspecialchars($posts[0]['ten_bhat'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Mã thể loại</span>
                    <input type="number" class="form-control" name="txtTheloai"
                        value="<?=htmlspecialchars($posts[0]['ma_tloai'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tóm tắt</span>
                    <input type="text" class="form-control" name="txtTomtat"
                        value="<?=htmlspecialchars($posts[0]['tomtat'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Nội dung</span>
                    <input type="text" class="form-control" name="txtnoidung"
                        value="<?=htmlspecialchars($posts[0]['noidung'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Mã tác giả</span>
                    <input type="number" class="form-control" name="txtTacgia"
                        value="<?=htmlspecialchars($posts[0]['ma_tgia'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Ngày viết</span>
                    <input type="date" class="form-control" name="ngayviet" required value="<?=$posts[0]['ngayviet']?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuImg">Ảnh bài viết</span>
                    <img src="uploads/<?=htmlspecialchars($posts[0]['hinhanh'])?>"
                        alt="Hình ảnh của <?=htmlspecialchars($posts[0]['tieude']) ?>" width="50">
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