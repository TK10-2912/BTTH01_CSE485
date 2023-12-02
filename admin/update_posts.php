<?php
@include("connect_database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $txtTieude = $_POST['txtTieude'];
    $txtTenbh = $_POST['txtTenbh'];
    $txtTheloai = $_POST['txtTheloai'];
    $txtTomtat = $_POST['txtTomtat'];
    $txtnoidung = $_POST['txtnoidung'];
    $txtTacgia = $_POST['txtTacgia'];
    $ngayviet = $_POST['ngayviet'];
    $id = $_POST['txtID'];
    $filename = $_FILES['file']['name'];
    $tmp_path = $_FILES['file']['tmp_name'];
    $upload_path = 'uploads/' . $filename;
    move_uploaded_file($tmp_path, $upload_path);

    // Cập nhật thông tin tác giả trong cơ sở dữ liệu
    $sql = "UPDATE baiviet 
    SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet, hinhanh=:hinhanh
    WHERE ma_bviet=:id";


    $statement = $connection->prepare($sql);
    $statement->bindParam(':tieude', $txtTieude, PDO::PARAM_STR);
    $statement->bindParam(':ten_bhat', $txtTenbh, PDO::PARAM_STR);
    $statement->bindParam(':ma_tloai', $txtTheloai, PDO::PARAM_STR);
    $statement->bindParam(':tomtat', $txtTomtat, PDO::PARAM_STR);
    $statement->bindParam(':noidung', $txtnoidung, PDO::PARAM_STR);
    $statement->bindParam(':ma_tgia', $txtTacgia, PDO::PARAM_STR);
    $statement->bindParam(':ngayviet', $ngayviet, PDO::PARAM_STR);
    $statement->bindParam(':hinhanh', $filename, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();

    // Chuyển hướng về trang danh sách tác giả sau khi cập nhật
    header("Location: ./posts.php");
} else {
   echo"2222222222";
}
?>
