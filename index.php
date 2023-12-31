<?php
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
$sql = "SELECT ma_bviet, tieude, hinhanh FROM baiviet";
$statement = $connection->prepare($sql);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
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

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="./admin/uploads/<?= $post['hinhanh']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="detail.php?id=<?=$post['ma_bviet']?>"
                                class="text-decoration-none"><?php echo $post['tieude']; ?></a>
                        </h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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