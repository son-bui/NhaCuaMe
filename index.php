<?php
session_start();
include "lib/DataProvider.php";
$_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhà Của Mễ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div id="wrapper">
        <?php
        include "modules/mHeader.php";
        ?>
        <div id="content">
            <?php
            $a = 1;
            if (isset($_GET["a"]) == true)
                $a = $_GET["a"];

            switch ($a) {
                case 1:
                    include "pages/pIndex.php";
                    break;
                case 2:
                    include "pages/pSanPhamTheoHang.php";
                    break;
                case 3:
                    include "pages/pSanPhamTheoLoai.php";
                    break;
                case 4:
                    include "pages/pChiTiet.php";
                    break;
                case 5:
                    include "pages/GioHang/pIndex.php";
                    break;
                case 6:
                    include "pages/TaoTaiKhoan/pIndex.php";
                    break;
                default:
                    include "pages/pError.php";
                    break;
            }
            ?>
        </div>
        <div class="footer-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="footer-company-name">&copy; Design By:
                            <b class="companyname">
                                Team Tên Gì Cũng Được
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php
    include "./modules/mModalLogin.php";
    include "./modules/mModalRegister.php"
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>