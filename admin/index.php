<?php
@include("get_data_index.php");
@include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Người dùng</a>
                    </h5>
                    <h5 class="h1 text-center">
                        <?php echo $soLuongNguoiDung?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="category.php" class="text-decoration-none">Thể loại</a>
                    </h5>
                    <h5 class="h1 text-center">
                        <?php echo $soLuongTheLoai?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="author.php" class="text-decoration-none">Tác giả</a>
                    </h5>
                    <h5 class="h1 text-center">
                        <?php
                    echo $soLuongTacGia
                ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="posts.php" class="text-decoration-none">Bài viết</a>
                    </h5>
                    <h5 class="h1 text-center">
                        <?php echo $soLuongBaiViet?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("footer.php")?>
</body>

</html>