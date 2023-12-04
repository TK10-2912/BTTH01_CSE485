<?php include("hearder.php"); ?>

<main class="container mt-5 mb-5">
    <h3 class="text-center">Danh sách thể loại</h3>
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success mb-3">Thêm mới</a>
            <?php
            $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tên thể loại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1; foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $row['ten_tloai']; ?></td>
                        <td>
                            <a href="edit_category.php?id=<?php echo $row['ma_tloai']; ?>" class="btn btn-success">Sửa</a>
                            <a href="delete_category.php?id=<?php echo $row['ma_tloai']; ?>" class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Xóa</a>
                        </td>
                    </tr>
                    <?php $index++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php @include("footer.php"); ?>
</body>
</html>
