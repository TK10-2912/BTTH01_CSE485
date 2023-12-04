<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
//Kết nối
define('DATABASE_SERVER', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', '');
define('DATABASE_NAME', 'btth01_cse485');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
       <?php
       @include("header.php");
       ?>
    </header>
    <main class="container mt-5">
        <div class="row mb-5">
            <div class="col-sm-4">
                <img src="./admin/uploads/<?= $posts[0]['hinhanh']; ?>" class="img-fluid" alt="...">
            </div>
            <div class="col-sm-8">
                <h5 class="card-title mb-2">
                    <a href="" class="text-decoration-none"><?=$posts[0]['tieude']?></a>
                </h5>
                <p class="card-text"><span class=" fw-bold">Bài hát: </span><?=$posts[0]['ten_bhat']?></p>
                <p class="card-text"><span class=" fw-bold">Thể loại: </span><?=$tentloai[0]['ten_tloai']?></p>
                <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?=$posts[0]['tomtat']?></p>
                <p class="card-text"><span class=" fw-bold">Nội dung: </span><?=$posts[0]['noidung']?></p>
                <p class="card-text"><span class=" fw-bold">Tác giả: </span><?=$tentacgia[0]['ten_tgia']?></p>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2"
        style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>