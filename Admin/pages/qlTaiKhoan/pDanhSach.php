<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th width="10%"> Mã tài khoản</th>
            <th width="10%"> Tên đăng nhập</th>
            <th width="10%"> Tên hiển thị</th>
            <th width="10%"> Địa chỉ</th>
            <th width="10%"> Điện thoại</th>
            <th width="10%"> Email</th>
            <th width="10%"> Tình trạng</th>
            <th width="10%"> Loại tài khoản</th>
            <th width="20%"> Thao tác</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DiaChi, t.DienThoai, t.Email, t.BiXoa, l.TenLoaiTaiKhoan FROM TaiKhoan t, LoaiTaiKHoan l 
              WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan";
    $result = DataProvider::ExecuteQuery($sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $row["MaTaiKhoan"]; ?></td>
            <td><?php echo $row["TenDangNhap"]; ?></td>
            <td><?php echo $row["TenHienThi"]; ?></td>
            <td><?php echo $row["DiaChi"]; ?></td>
            <td><?php echo $row["DienThoai"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td>
                <?php
                if ($row["BiXoa"] == 1) {
                    echo "<img src='images/locked.png' />";
                    echo "<p>Chưa Khóa</p>";
                } else {
                    echo "<img src='images/active.png' />";
                    echo "<p>Đã Khóa</p>";
                }
                ?>
            </td>
            <td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
            <td>
                <a href="pages/qlTaiKhoan/xlKhoa.php?id=<?php echo $row["MaTaiKhoan"] ?>">
                    <button class="btn btn-danger">
                        Khóa
                    </button>
                </a>
                <a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"] ?> ">
                    <button class="btn btn-primary">
                        Chỉnh Sửa
                    </button>
                </a>
            </td>

        </tr>
    <?php
    }
    ?>
</table>