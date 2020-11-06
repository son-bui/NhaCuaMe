<?php
session_start();
include "../lib/DataProvider.php";

//Kiểm tra có người dùng đăng nhập với quyền admin hay chưa?

if (!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
  DataProvider::ChangeURL("../index.php");

$c = 0;
if (isset($_GET["c"]))
  $c = $_GET["c"];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Phân hệ quản lý</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body>
  <div id="wrapper">
    <div id="header">
      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a href="index.php" class="navbar-brand mr-1">
          <img src="../img/nhacuame.png" alt="Nha cua me" width="50"> Admin Dashboard
        </a>
        <ul class="navbar-nav ml-auto ml-md-0">
          <?php
          if (isset($_SESSION["MaTaiKhoan"])) {
          ?>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Hello <?php echo $_SESSION["TenHienThi"]; ?></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../modules/xlDangXuat.php">
                <i class="fas fa-sign-out-alt"></i>
                Đăng xuất
              </a>
            </li>
          <?php
          }
          ?>
          </li>
        </ul>
      </nav>
    </div>

    <div id="content">
      <div id="menu">
        <ul class="sidebar navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=1" <?php if ($c == 1) echo "class='selected'"; ?>>
              <i class="fas fa-users-cog"></i>
              <span>Quản lý tài khoản</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=2" <?php if ($c == 2) echo "class='selected'"; ?>>
              <i class="fas fa-table"></i>
              Quản lý sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=3" <?php if ($c == 3) echo "class='selected'"; ?>>
              <i class="fas fa-code-branch"></i>
              <span>Quản lý loại </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=4" <?php if ($c == 4) echo "class='selected'"; ?>>
              <i class="fas fa-tags"></i>
              <span>Quản lý hãng </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=5" <?php if ($c == 5) echo "class='selected'"; ?>>
              <i class="fas fa-clipboard-list"></i>
              <span>Quản lý đơn đặt hàng</span>
            </a>
          </li>
        </ul>
      </div>
      <div id="content-wrapper">
        <div class="container-fluid">
          <?php
          switch ($c) {
            case 0:
              include "pages/pIndex.php";
              break;
            case 1:
              include "pages/qlTaiKhoan/pIndex.php";
              break;
            case 2:
              include "pages/qlSanPham/pIndex.php";
              break;
            case 3:
              include "pages/qlLoai/pIndex.php";
              break;
            case 4:
              include "pages/qlHang/pIndex.php";
              break;
            case 5:
              include "pages/qlDonDatHang/pIndex.php";
              break;
            default:
              include "pages/pError.php";
              break;
          }
          ?>
        </div>
        <div id="footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>&copy; Design by Team Tên gì cũng được</span>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  include "../Admin/pages/qlSanPham/pThemMoi.php";
  include "../Admin/pages/qlLoai/pThemMoi.php";
  include "../Admin/pages/qlHang/pThemMoi.php";
?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>