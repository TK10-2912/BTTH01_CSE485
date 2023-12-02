<?php
@include("connect_database.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql = "DELETE FROM theloai WHERE ma_tloai=$id";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->closeCursor();
header("Location: ./category.php");
}
?>