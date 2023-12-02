<?php
    //PDO - PHP Data Object
    define('DATABASE_SERVER', 'localhost');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASSWORD', '');
    define('DATABASE_NAME', 'btth01_cse485');
    $connection = null;
    try {
        $connection =  new PDO(
            "mysql:host=".DATABASE_SERVER.";dbname=".DATABASE_NAME, 
            DATABASE_USER, DATABASE_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Số lượng thể loại
        $sql = "SELECT COUNT(ma_tloai) FROM theloai";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $soLuongTheLoai = $result[0]['COUNT(ma_tloai)'];
        $statement->closeCursor();
        // Số lượng tác giả
        $sql = "SELECT COUNT(ma_tgia) FROM tacgia";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $soLuongTacGia = $result[0]['COUNT(ma_tgia)'];
        $statement->closeCursor();
        //Số lượng bài viết
        $sql = "SELECT COUNT(ma_bviet) FROM baiviet";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $soLuongBaiViet = $result[0]['COUNT(ma_bviet)'];
        $statement->closeCursor();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        $connection = null;
    }
?>