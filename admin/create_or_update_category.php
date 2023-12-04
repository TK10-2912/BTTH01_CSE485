<?php
@include("connect_database.php");
    if(isset($_POST['txtCatId']))
    {
    $txtCatName=$_POST['txtCatName'];
    $txtCatId=$_POST['txtCatId'];
    $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ten_tloai', $txtCatName, PDO::PARAM_STR);
    $statement->bindParam(':ma_tloai', $txtCatId, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./category.php");
    }
    else
        {
            $txtCatName=$_POST['txtCatName'];
            $sql = "INSERT INTO theloai(ten_tloai) VALUES('$txtCatName')";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $statement->closeCursor();
            header("Location: ./category.php");
            }
    

?>