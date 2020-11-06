<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Quản Lý Tài Khoản</li>
    </ol>
    <h1>Quản lý tài khoản</h1>
    <?php
    $a = 1;
    if (isset($_GET["a"]))
        $a = $_GET["a"];

    switch ($a) {
        case 1:
            include "pages/qlTaiKhoan/pDanhSach.php";
            break;
        case 2:
            include "pages/qlTaiKhoan/pCapNhat.php";
            break;
        default:
            include "pages/pError.php";
            break;
    }
    ?>
</body>

</html>