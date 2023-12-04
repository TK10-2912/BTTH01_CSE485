<?php
include("hearder.php");
if(isset($_GET['id']))
{
    $ma_tgia = $_GET['id'];
    $sql = "SELECT * FROM tacgia WHERE ma_tgia=$ma_tgia";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $author = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else
header("Location: ./author.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="create_or_update_author.php" method="post" enctype="multipart/form-data">
                <div style="display: none;" class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtAuId" value="<?=htmlspecialchars($ma_tgia)?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtAuName" value="<?=htmlspecialchars($author[0]['ten_tgia'])?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuImg">Ảnh tác giả</span>
                    <img src="uploads/<?=htmlspecialchars($author[0]['hinh_tgia'])?>"
                        alt="Hình ảnh của <?=htmlspecialchars($author[0]['ten_tgia']) ?>" width="50">
                    <input type="file" name="file" id="file">
                </div>
                <?php
            ?>
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