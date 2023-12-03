<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
//Kết nối
define('DATABASE_SERVER', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', '');
define('DATABASE_NAME', 'th1web');
try {
    $connection =  new PDO(
        "mysql:host=" . DATABASE_SERVER . ";dbname=" . DATABASE_NAME,
        DATABASE_USER,
        DATABASE_PASSWORD
    );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $connection = null;
}
//truy vấn trong bài viết
$sql = "SELECT tieude,ten_bhat, hinhanh,ma_tgia,ma_tloai,tomtat,noidung  FROM baiviet WHERE ma_bviet=$id";
$statement = $connection->prepare($sql);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
//truy vấn lấy ra tên thể loại
    $sql = "SELECT ten_tloai FROM theloai WHERE ma_tloai=:ma_tloai";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ma_tloai', $posts[0]['ma_tloai'], PDO::PARAM_INT);
    $statement->execute();
    $tentloai = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
//truy vấn lấy ra tên tác giả
    $sql = "SELECT ten_tgia FROM tacgia WHERE ma_tgia=:ma_tgia";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':ma_tgia', $posts[0]['ma_tgia'], PDO::PARAM_INT);
    $statement->execute();
    $tentacgia = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row mb-5">
            <?php
            // Hiển thị danh sách bài hát
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-4">';
                    echo '<img src="' . $row['image_url'] . '" class="img-fluid" alt="...">';
                    echo '</div>';
                    echo '<div class="col-sm-8">';
                    echo '<h5 class="card-title mb-2">';
                    echo '<a href="detail.php?song_id=' . $row['ma_bviet'] . '" class="text-decoration-none">' . $row['tieude'] . '</a>';
                    echo '</h5>';
                    echo '<p class="card-text"><span class=" fw-bold">Bài hát: </span>' . $row['ten_bhat'] . '</p>';
                    echo '<p class="card-text"><span class=" fw-bold">Thể loại: </span>' . $row['ma_tloai'] . '</p>';
                    echo '<p class="card-text"><span class=" fw-bold">Tóm tắt: </span>' . $row['tomtat'] . '</p>';
                    echo '<p class="card-text"><span class=" fw-bold">Nội dung: </span>' . $row['noidung'] . '</p>';
                    echo '<p class="card-text"><span class=" fw-bold">Tác giả: </span>' . $row['ma_tgia'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Không có bài hát.";
            }

            // Đóng kết nối
            $conn->close();
            ?>
        </div>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
