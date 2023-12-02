<?php
@include("connect_database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $txtTieude = $_POST['txtTieude'];
    $txtTenbh = $_POST['txtTenbh'];
    $txtTheloai = $_POST['txtTheloai'];
    $txtTomtat = $_POST['txtTomtat'];
    $txtnoidung = $_POST['txtnoidung'];
    $txtTacgia = $_POST['txtTacgia'];
    $ngayviet = $_POST['ngayviet'];
    $filename = $_FILES['file']['name'];
    $tmp_path = $_FILES['file']['tmp_name'];
    $upload_path = 'uploads/' . $filename;
    move_uploaded_file($tmp_path, $upload_path);
    
    // Thêm thông tin vào cơ sở dữ liệu
    $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
            VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':tieude', $txtTieude, PDO::PARAM_STR);
    $statement->bindParam(':ten_bhat', $txtTenbh, PDO::PARAM_STR);
    $statement->bindParam(':ma_tloai', $txtTheloai, PDO::PARAM_STR);
    $statement->bindParam(':tomtat', $txtTomtat, PDO::PARAM_STR);
    $statement->bindParam(':noidung', $txtnoidung, PDO::PARAM_STR);
    $statement->bindParam(':ma_tgia', $txtTacgia, PDO::PARAM_STR);
    $statement->bindParam(':ngayviet', $ngayviet, PDO::PARAM_STR);
    $statement->bindParam(':hinhanh', $filename, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./posts.php");
}
?>
