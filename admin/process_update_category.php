<?php
@include("connect_database.php");
if (isset($_POST['txtma_tloai']) && isset($_POST['txtten_tloai'])) {
    $txtma_tloai = $_POST['txtma_tloai'];
    $txtten_tloai = $_POST['txtten_tloai'];
    // Sử dụng prepared statements và binding parameters để tránh SQL Injection
    $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ten_tloai', $txtten_tloai, PDO::PARAM_STR);
    $statement->bindParam(':ma_tloai', $txtma_tloai, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
    header("Location: ./category.php");
}
?>
