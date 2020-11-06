<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th width="10%">STT</th>
            <th width="15%">Mã đơn đặt hàng</th>
            <th width="10%">Ngày lập</th>
            <th width="25%">Khách hàng</th>
            <th width="20%">Tình trạng</th>
            <th width="20%">Thao tác</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT  d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang FROM TaiKhoan t, DonDatHang d, TinhTrang tt 
              WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang ORDER BY d.MaTinhTrang, d.NgayLap";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        $c = "";
        switch ($row["MaTinhTrang"]) {
            case 2:
                $c = "classGiaoHang";
                break;
            case 3:
                $c = "classThanhToan";
                break;
            case 4:
                $c = "classHuy";
                break;
        }
    ?>
        <tr class="<?php echo $c; ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["MaDonDatHang"]; ?></td>
            <td><?php echo $row["NgayLap"]; ?></td>
            <td><?php echo $row["TenHienThi"]; ?></td>
            <td><?php echo $row["TenTinhTrang"]; ?></td>
            <td>
                <a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"] ?> ">
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