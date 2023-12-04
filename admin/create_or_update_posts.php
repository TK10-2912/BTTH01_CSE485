<?php
@include("connect_database.php");
    if(isset($_POST['txtPostId']))
    {
    $txtPostTitle=$_POST['txtPostTitle'];
    $txtPostId=$_POST['txtPostId'];
    $txtPostName=$_POST['txtPostName'];
    $txtPostCat=$_POST['txtPostCat'];
    $txtTomtat=$_POST['txtTomtat'];
    $txtnoidung=$_POST['txtnoidung'];
    $txtPostAu=$_POST['txtPostAu'];
    $txtPostDate=$_POST['txtPostDate'];
    $new_image_path = null;
    if (!empty($_FILES['file']['name'])) {
        $new_image_name = $_FILES['file']['name'];
        $tmp_path = $_FILES['file']['tmp_name'];
        $new_image_path = 'uploads/' . $new_image_name;
        move_uploaded_file($tmp_path, $new_image_path);
    }
    // Cập nhật thông tin tác giả trong cơ sở dữ liệu
    $sql = "";
    if ($new_image_path) {
        $sql = "UPDATE baiviet 
        SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet, hinhanh=:hinhanh
        WHERE ma_bviet=:id";
    }
    else
    $sql = "UPDATE baiviet 
    SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet
    WHERE ma_bviet=:id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':tieude', $txtPostTitle, PDO::PARAM_STR);
    $statement->bindParam(':ten_bhat', $txtPostName, PDO::PARAM_STR);
    $statement->bindParam(':ma_tloai', $txtPostCat, PDO::PARAM_STR);
    $statement->bindParam(':tomtat', $txtTomtat, PDO::PARAM_STR);
    $statement->bindParam(':noidung', $txtnoidung, PDO::PARAM_STR);
    $statement->bindParam(':ma_tgia', $txtPostAu, PDO::PARAM_STR);
    $statement->bindParam(':ngayviet', $txtPostDate, PDO::PARAM_STR);
    if ($new_image_path) {
    $statement->bindParam(':hinhanh', $new_image_name, PDO::PARAM_STR);
    }
    $statement->bindParam(':id', $txtPostId, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./posts.php");
    }
    else
        {
            $txtPostTitle=$_POST['txtPostTitle'];
            $txtPostName=$_POST['txtPostName'];
            $txtPostCat=$_POST['txtPostCat'];
            $txtTomtat=$_POST['txtTomtat'];
            $txtnoidung=$_POST['txtnoidung'];
            $txtPostAu=$_POST['txtPostAu'];
            $txtPostDate=$_POST['txtPostDate'];
            $filename = $_FILES['file']['name'];
            $tmp_path = $_FILES['file']['tmp_name'];
            $upload_path = 'uploads/' . $filename;
            move_uploaded_file($tmp_path, $upload_path);
            
            $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
                    VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':tieude', $txtPostTitle, PDO::PARAM_STR);
            $statement->bindParam(':ten_bhat', $txtPostName, PDO::PARAM_STR);
            $statement->bindParam(':ma_tloai', $txtPostCat, PDO::PARAM_STR);
            $statement->bindParam(':tomtat', $txtTomtat, PDO::PARAM_STR);
            $statement->bindParam(':noidung', $txtnoidung, PDO::PARAM_STR);
            $statement->bindParam(':ma_tgia', $txtPostAu, PDO::PARAM_STR);
            $statement->bindParam(':ngayviet', $txtPostDate, PDO::PARAM_STR);
            $statement->bindParam(':hinhanh', $filename, PDO::PARAM_STR);
            $statement->execute();
            $statement->closeCursor();
            header("Location: ./posts.php");
            }
    

?>