<?php
@include("connect_database.php");
    if(isset($_POST['txtCatName']))
    {
    $txtCatName=$_POST['txtCatName'];
    $sql = "INSERT INTO theloai(ten_tloai) VALUES('$txtCatName')";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./category.php");
    }
    else
    {
    $error = "Enter a category name";
    header("Location: ./add_category.php?error=$error");
    }

?>