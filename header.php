<nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"
                                aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <?php
                            session_start();
                            if(isset($_SESSION['user']) && isset($_SESSION['pass']))
                            {
                                echo " <li class='nav-item'><a class='nav-link' href='./admin/index.php'>Admin</a> </li>";
                            }
                            else
                            echo "<li class='nav-item'><a class='nav-link " . (basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '') . "' href='./login.php'>Đăng nhập</a></li>";

                        ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>