<?php include("hearder.php"); ?>

<main class="container mt-5 mb-5">
    <h3 class="text-center">Danh sách tác giả</h3>
    <div class="row">
        <div class="col-sm">
            <a href="add_author.php" class="btn btn-success mb-3">Thêm mới</a>
            <?php
            $sql = "SELECT * FROM tacgia";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $authors = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tên Tác giả</th>
                        <th>Hình ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $indexAuthor = 1; foreach ($authors as $author): ?>
                    <tr>
                        <td><?php echo $indexAuthor ?></td>
                        <td><?php echo $author['ten_tgia']; ?></td>
                        <td><img src="uploads/<?php echo $author['hinh_tgia']; ?>"
                                alt="Hình ảnh của <?php echo $author['ten_tgia']; ?>" class="img-thumbnail"
                                style="max-width: 50px;"></td>
                        <td>
                            <a href="edit_author.php?id=<?=$author['ma_tgia']?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="delete_author.php?id=<?php echo $author['ma_tgia']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Xoá</a>
                        </td>
                    </tr>
                    <?php $indexAuthor++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php @include("footer.php"); ?>
</body>
</html>
