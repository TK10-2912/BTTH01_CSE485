<?php
@include("connect_database.php");
//Số lượng người dùng
$sql = "SELECT COUNT(username) FROM users";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$soLuongNguoiDung = $result[0]['COUNT(username)'];
$statement->closeCursor();
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
?>