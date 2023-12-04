<?php
include("hearder.php");
if(isset($_GET['id']))
{
    $ma_tloai = $_GET['id'];
    $sql = "SELECT * FROM theloai WHERE ma_tloai=$ma_tloai";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $category = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else
header("Location: ./category.php");
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Chỉnh sửa thể loại</h3>
            <form action="create_or_update_category.php" method="post">
                <div style="display:none" class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="txtCatId"
                        value="<?=htmlspecialchars($ma_tloai)?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="txtCatName"
                        value="<?=htmlspecialchars($category[0]['ten_tloai'])?>">
                </div>
                <?php
                // if(isset($_GET['error']))
                // {
                //     $error = $_GET['error']; // Lấy giá trị từ tham số error
                //     echo "<div style='color:red'>$error</div>";
                // } 
            ?>
                <div class="form-group  float-end ">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
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