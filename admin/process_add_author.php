<?php
@include("connect_database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $txtAuName = $_POST['txtAuName'];
    $filename = $_FILES['file']['name'];
    $tmp_path = $_FILES['file']['tmp_name'];
    $upload_path = 'uploads/' . $filename;
    move_uploaded_file($tmp_path, $upload_path);
    // Thêm thông tin vào cơ sở dữ liệu
    $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (:ten_tgia, :hinh_tgia)";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ten_tgia', $txtAuName, PDO::PARAM_STR);
    $statement->bindParam(':hinh_tgia', $filename, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
    header("Location:./author.php");
}
?>
