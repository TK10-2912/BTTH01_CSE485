<?php
include("hearder.php");
?>

<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success">Thêm mới</a>
            <?php
            $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo '<table class="table table-striped">';
            echo '<thead class="thead-dark"><tr><th>#</th><th>Tên thể loại</th><th>Thao tác</th></tr></thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                $ma_tloai = $row['ma_tloai'] ?? '';
                $ten_tloai = $row['ten_tloai'] ?? '';
                echo "<tr><td>$ma_tloai</td><td>$ten_tloai</td>";
                echo '<td>
                <a href="edit_category.php?ma_tloai=' . $ma_tloai . '&ten_tloai=' . $ten_tloai . '" class="btn btn-success">Sửa</a>
                <a href="delete_category.php?id=' . $ma_tloai . '" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xoá không?\')">Xóa</a>
              </td></tr>';
            }
            echo '</tbody>';
            echo '</table>';
            ?>
        </div>
    </div>
</main>

<?php
@include("footer.php");
?>
</body>

</html>