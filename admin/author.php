<?php
include("hearder.php");
?>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_author.php" class="btn btn-success">Thêm mới</a>
            <?php
            $sql = "SELECT * FROM tacgia";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $authors = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên Tác giả</th>
                        <th>Hình ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($authors as $author): ?>
                    <tr>
                        <td><?php echo $author['ma_tgia']; ?></td>
                        <td><?php echo $author['ten_tgia']; ?></td>
                        <td><img src="uploads/<?php echo $author['hinh_tgia']; ?>"
                                alt="Hình ảnh của <?php echo $author['ten_tgia']; ?>" width="50"></td>
                        <td>
                            <a href="edit_author.php?ma_tgia=<?=$author['ma_tgia']?>&ten_tgia=<?=$author['ten_tgia']?>&hinh_tgia=<?=$author['hinh_tgia']?>"
                                class="btn btn-success">Sửa</a>
                            <a href="delete_author.php?id=<?php echo $author['ma_tgia']; ?>" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Xoá</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</main>

<?php
@include("footer.php");
?>
</body>

</html>