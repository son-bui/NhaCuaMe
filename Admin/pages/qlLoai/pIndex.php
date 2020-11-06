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
        <li class="breadcrumb-item active">Quản Lý Loại Sản Phẩm</li>
    </ol>
    <h1>Quản lý loại sản phẩm</h1>
    <?php
    $a = 1;
    if (isset($_GET["a"])) {
        $a = $_GET["a"];
    }

    switch ($a) {
        case 1:
            include "pages/qlLoai/pDanhSach.php";
            break;
        case 2:
            include "pages/qlLoai/pCapNhat.php";
            break;
        case 3:
            include "pages/qlLoai/pThemMoi.php";
            break;
        default:
            include "pages/pError.php";
            break;
    }
    ?>
</body>

</html>