<?php
@include("connect_database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $ma_tgia = $_POST['txtma_tgia'];
    $ten_tgia = $_POST['txtten_tgia'];

    // Xử lý tải lên hình ảnh mới nếu có
    $new_image_path = null;
    if (!empty($_FILES['upload']['name'])) {
        $new_image_name = $_FILES['upload']['name'];
        $tmp_path = $_FILES['upload']['tmp_name'];
        $new_image_path = 'uploads/' . $new_image_name;
        move_uploaded_file($tmp_path, $new_image_path);
    }

    // Cập nhật thông tin tác giả trong cơ sở dữ liệu
    $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia";
    if ($new_image_path) {
        $sql .= ", hinh_tgia = :hinh_tgia";
    }
    $sql .= " WHERE ma_tgia = :ma_tgia";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':ten_tgia', $ten_tgia, PDO::PARAM_STR);
    if ($new_image_path) {
        $statement->bindParam(':hinh_tgia', $new_image_name, PDO::PARAM_STR);
    }
    $statement->bindParam(':ma_tgia', $ma_tgia, PDO::PARAM_INT);

    $statement->execute();
    $statement->closeCursor();

    // Chuyển hướng về trang danh sách tác giả sau khi cập nhật
    header("Location: ./author.php");
} else {
   echo"2222222222";
}
?>
