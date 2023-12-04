<?php
include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
            <form action="create_or_update_author.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtAuName">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAuImg">Ảnh tác giả</span>
                    <input type="file" name="file" id="file">
                </div>
                <?php
            ?>
                <div class="form-group  float-end ">
                    <input type="submit" value="Thêm" class="btn btn-success">
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