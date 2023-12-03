<?php
include("hearder.php");
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_posts.php" class="btn btn-success">Thêm mới</a>
            <?php
            $sql = "SELECT * FROM baiviet";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tên bài hát</th>
                        <th>Tóm tắt</th>
                        <th>Hình ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo $post['ma_bviet']; ?></td>
                        <td><?php echo $post['tieude']; ?></td>
                        <td><?php echo $post['ten_bhat']; ?></td>
                        <td><?php echo $post['tomtat']; ?></td>
                        <td><img src="uploads/<?php echo $post['hinhanh']; ?>"
                                alt="Hình ảnh của <?php echo $post['ten_bhat']; ?>" width="50"></td>
                        <td>
                            <a href="edit_posts.php?id=<?=$post['ma_bviet']?>" class="btn btn-success">Sửa</a>
                            <a href="delete_posts.php?id=<?php echo $post['ma_bviet']; ?>" class="btn btn-danger"
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