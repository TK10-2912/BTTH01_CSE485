<?php
include("hearder.php");
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_category.php" class="btn btn-success">Thêm mới</a>
                <?php
                $sql = "select ma_tloai, ten_tloai from theloai";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                echo '<table class="table table-striped">';
                echo '<thead class="thead-dark"><tr><th>#</th><th>Tên thể loại</th></tr></thead>';
                echo '<tbody>';
                foreach ($result as $row) {
                    $ma_tloai = $row['ma_tloai'] ?? '';
                    $ten_tloai = $row['ten_tloai'] ?? '';
                    echo "<tr><td>$ma_tloai</td><td>$ten_tloai</td></tr>";
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