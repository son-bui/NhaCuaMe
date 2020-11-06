<?php
if (!isset($_GET["id"]))
    DataProvider::ChangeURL("index.php?c=404");

$id = $_GET["id"];
$sql = "SELECT  d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, t.DiaChi, t.DienThoai, tt.MaTinhTrang, tt.TenTinhTrang FROM TaiKhoan t, DonDatHang d, TinhTrang tt 
              WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang AND MaDonDatHang = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>
<div class="form-group border border-dark">
    <fieldset>
        <legend>Thông tin đơn đặt hàng</legend>
        <div class="form-group">
            <span>Mã đơn đặt hàng:</span>
            <?php echo $row["MaDonDatHang"]; ?>
        </div>
        <div class="form-group">
            <span>Ngày đăt hàng:</span>
            <?php echo $row["NgayLap"]; ?>
        </div>
        <div class="form-group">
            <span>Tên khách hàng:</span>
            <?php echo $row["TenHienThi"]; ?>
        </div>
        <div class="form-group">
            <span>Số điện thoại:</span>
            <?php echo $row["DienThoai"]; ?>
        </div>
        <div class="form-group">
            <span>Địa chỉ giao hàng:</span>
            <?php echo $row["DiaChi"]; ?>
        </div>
        <div class="form-group">
            <span>Tổng thành tiền:</span>
            <?php echo $row["TongThanhTien"]; ?> đồng
        </div>
    </fieldset>
</div>
<div class="list-group">
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>" class="btnGiaoHang list-group-item list-group-item-action active">
        Giao hàng
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>" class="btnThanhToan list-group-item list-group-item-action">
        Thanh toán
    </a>
    <a href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php echo $id; ?>" class="btnHuy list-group-item list-group-item-action">
        Hủy đơn hàng
    </a>
    <a href="#" onclick="window.print();" class="btnInDonHang list-group-item list-group-item-action disabled">
        In đơn hàng
    </a>
</div>

<h2>Chi tiết đơn hàng</h2>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th width="20%">STT</th>
            <th width="20%">Tên sản phẩm</th>
            <th width="20%">Hình</th>
            <th width="20%">Số lượng</th>
            <th width="20%">Giá bán</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c, SanPham s WHERE c.MaSanPham = s.MaSanPham 
          AND c.MaDonDatHang = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["TenSanPham"]; ?></td>
            <td>
                <img src="../images/<?php echo $row["HinhURL"]; ?>" height="35" />
            </td>
            <td><?php echo $row["SoLuong"]; ?></td>
            <td><?php echo $row["GiaBan"]; ?></td>
        </tr>
    <?php
    }
    ?>
</table>