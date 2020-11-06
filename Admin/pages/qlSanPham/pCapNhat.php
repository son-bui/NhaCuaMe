<?php
if (!isset($_GET["id"]))
    DataProvider::ChangeURL("index.php?c=404");

$id = $_GET["id"];
$sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.MoTa, s.BiXoa, l.TenLoaiSanPham,
     s.MaHangSanXuat, h.TenHangSanXuat, s.MaLoaiSanPham  FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaSanPham = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>
<form action="pages/qlSanPham/xlCapNhat.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
    <fieldset class="ThemSanPham">
        <h2>Cập nhật thông tin sản phẩm</h2>
        <div class="form-group">
            <label for="">Tên hãng sản xuất</label>
            <input class="form-control form-control-sm" type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenSanPham"]; ?>" />
            <o id="errTen"></i>
        </div>
        <div class="form-group">
            <label for="">Hãng sản xuất</label>
            <select class="form-control form-control-sm" name="cmbHang" id="">
                <?php
                $sql = "SELECT *FROM HangSanXuat WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while ($row1 = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row1["MaHangSanXuat"]; ?>" <?php if ($row["MaHangSanXuat"] == $row1["MaHangSanXuat"]) echo "selected";
                                                                            ?>><?php echo $row1["TenHangSanXuat"]; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Loại sản phẩm</label>
            <select class="form-control form-control-sm" name="cmbLoai" id="">
                <?php
                $sql = "SELECT *FROM LoaiSanPham WHERE BiXoa = 0";
                $result = DataProvider::ExecuteQuery($sql);
                while ($row1 = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row1["MaLoaiSanPham"]; ?>" <?php if ($row["MaLoaiSanPham"] == $row1["MaLoaiSanPham"]) echo "selected";
                                                                            ?>><?php echo $row1["TenLoaiSanPham"]; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="">Hình</label>
                <input type="file" class="btn btn-light" name="fHinh" /><br /> <br>
                <img src="../images/<?php echo $row["HinhURL"]; ?>" width="75" />
            </div class="form-group">
            <div class="form-group">
                <label for="">Giá</label>
                <input class="form-control form-control-sm" type="text" name="txtGia" id="txtGia" value="<?php echo $row["GiaSanPham"]; ?>" />
                <i id="errGia"></i>
            </div>
            <div class="form-group">
                <label for="">Số lượng tồn</label>
                <input class="form-control form-control-sm" type="text" name="txtTon" id="txtTon" value="<?php echo $row["SoLuongTon"]; ?>" />
                <i id="errTon"></i>
            </div>
            <div class="form-group">
                <label for="">Số lượng bán</label>
                <input class="form-control form-control-sm" type="text" name="txtBan" id="txtBan" value="<?php echo $row["SoLuongBan"]; ?>" />
                <i id="errBan"></i>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control form-control-sm" name="txtMoTa"><?php echo $row["MoTa"]; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row["MaSanPham"]; ?>" />
                    <input type="submit" class="btn btn-success" value="Cập nhật" />
                    <div>
    </fieldset>
</form>
<script type="text/javascript">
    function KiemTra() {
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if (ten.value == "") {
            err.innerHTML = "Tên sản phẩm không được rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        var ten = document.getElementById("txtGia");
        var err = document.getElementById("errGia");
        if (ten.value == "") {
            err.innerHTML = "Giá sản phẩm không được rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        var ten = document.getElementById("txtTon");
        var err = document.getElementById("errTon");
        if (ten.value == "") {
            err.innerHTML = "Số lượng tồn không được rỗng";
            ten.focus();
            return false;
        } else
            err.innerHTML = "";

        return true;
    }
</script>