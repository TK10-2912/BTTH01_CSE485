<?php
@include("connect_database.php");
    if(isset($_POST['txtAuId']))
    {
    $txtAuName=$_POST['txtAuName'];
    $txtAuId=$_POST['txtAuId'];
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
        $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia, hinh_tgia=:hinh_tgia WHERE ma_tgia=:ma_tgia";
    }
    else
    $sql="UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia=:ma_tgia";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ten_tgia', $txtAuName, PDO::PARAM_STR);
    if ($new_image_path) {
        $statement->bindParam(':hinh_tgia', $new_image_name, PDO::PARAM_STR);
    }
    $statement->bindParam(':ma_tgia', $txtAuId, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./author.php");
    // Chuyển hướng về trang danh sách tác giả sau khi cập nhật
    }
    else
        {
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