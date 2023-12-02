<?php
@include("connect_database.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql = "DELETE FROM tacgia WHERE ma_tgia=$id";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->closeCursor();
header("Location: ./author.php");
}
?>