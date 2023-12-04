<?php include("hearder.php"); ?>

<main class="container-fluid mt-5 mb-5">
    <h3 class="text-center">Danh sách bài viết</h3>
    <div class="row">
        <div class="col-sm">
            <a href="add_posts.php" class="btn btn-success mb-3">Thêm mới</a>
            <?php
            $sql = "SELECT * FROM baiviet";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Tên bài hát</th>
                        <th>Tóm tắt</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $indexPost=1; foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo $indexPost; ?></td>
                        <td><?php echo $post['tieude']; ?></td>
                        <td><?php echo $post['ten_bhat']; ?></td>
                        <td><?php echo $post['tomtat']; ?></td>
                        <td><img src="uploads/<?php echo $post['hinhanh']; ?>"
                                alt="Hình ảnh của <?php echo $post['ten_bhat']; ?>" width="100"></td>
                        <td>
                            <a href="edit_posts.php?id=<?=$post['ma_bviet']?>" class="btn btn-success btn-sm">Sửa</a>
                            <a href="delete_posts.php?id=<?php echo $post['ma_bviet']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Xoá</a>
                        </td>
                    </tr>
                    <?php $indexPost++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php @include("footer.php"); ?>
</body>
</html>
