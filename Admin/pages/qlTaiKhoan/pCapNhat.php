<form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
    <fieldset class="form-group">
        <h2>Cập nhập thông tin tài khoản</h2>
        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            $TenDangNhap = $row["TenDangNhap"];
            $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];
        }
        ?>
        <div class="form-group">
            <span>Tên đăng nhập:</span>
            <strong><?php echo $TenDangNhap; ?></strong>            
        </div>
        <div class="form-group">
            <span>Loại tài khoản:</span>
            <div class="form-group">
                <select class="form-control" name="cmbLoaiTaiKhoan" id="">
                    <?php
                    $sql = "SELECT *FROM LoaiTaiKhoan";
                    $result = DataProvider::ExecuteQuery($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                            echo "<option value='" . $row["MaLoaiTaiKhoan"] . "' selected>" . $row["TenLoaiTaiKhoan"] . "</option>";
                        else
                            echo "<option value='" . $row["MaLoaiTaiKhoan"] . "'>" . $row["TenLoaiTaiKhoan"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Cập nhật" />
        </div>
    </fieldset>
</form>