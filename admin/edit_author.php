<?php
@include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="update_author.php" method="post" enctype="multipart/form-data">
                <?php
                            if(isset($_GET['ma_tgia']) && isset($_GET['ten_tgia']))
                                {
                                    $mtg = $_GET['ma_tgia'];
                                    $ttg = $_GET['ten_tgia'];
                                    $htg=  $_GET['hinh_tgia']??null;
                                }
                        ?>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtma_tgia" value="<?php echo $mtg ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtten_tgia" value="<?php echo $ttg ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Ảnh tác giả</span>
                    <img  src="uploads/<?php echo $htg ?>"
                        alt="Hình ảnh của <?php echo $ttg ?>" width="50">
                    <input type="file" class="form-control" name="upload">
                </div>
                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="author.php" class="btn btn-warning ">Quay lại</a>
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