<?php
@include("connect_database.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql = "DELETE FROM baiviet WHERE ma_bviet=$id";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->closeCursor();
header("Location: ./posts.php");
}
?>