<?php
include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
            <form action="process_add_post.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tiêu đề</span>
                    <input type="text" class="form-control" name="txtTieude">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tên bài hát</span>
                    <input type="text" class="form-control" name="txtTenbh">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Mã thể loại</span>
                    <input type="number" class="form-control" name="txtTheloai">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tóm tắt</span>
                    <input type="text" class="form-control" name="txtTomtat">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Nội dung</span>
                    <input type="text" class="form-control" name="txtnoidung">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Mã tác giả</span>
                    <input type="number" class="form-control" name="txtTacgia">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Ngày viết</span>
                    <input type="date"  class="form-control" name="ngayviet" required>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuImg">Ảnh bài viết</span>
                    <input type="file" name="file" id="file">
                </div>
                <?php
            ?>
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