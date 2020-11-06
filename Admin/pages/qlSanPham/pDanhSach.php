<a href="index.php?c=2&a=3">
    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#addNewProduct">
        Thêm Sản Phẩm
    </a>
</a>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th width="4%">STT</th>
            <th width="5%">Tên sản phẩm</th>
            <th width="10%">Hình</th>
            <th width="6%">Giá</th>
            <th width="5%">Ngày nhập</th>
            <th width="5%">Số lượng tồn</th>
            <th width="5%">Số lượng bán</th>
            <th width="5%">Số lược xem</th>
            <th width="5%">Loại</th>
            <th width="5%">Hãng</th>
            <th width="10%">Mô tả</th>
            <th width="10%">Trạng thái</th>
            <th width="25%">Thao tác</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.MoTa, s.BiXoa,
       l.TenLoaiSanPham , h.TenHangSanXuat FROM SanPham s, LoaiSanPham l, HangSanXuat h 
              WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat ORDER BY s.MaSanPham DESC";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
    ?>

        <tr>
            <td><?php echo $i++; ?></td>

            <td><?php echo $row["TenSanPham"]; ?></td>
            <td><img width=200px src="../images/<?php echo $row["HinhURL"]; ?>" /></td>
            <td><?php echo $row["GiaSanPham"]; ?></td>
            <td><?php echo $row["NgayNhap"]; ?></td>
            <td><?php echo $row["SoLuongTon"]; ?></td>
            <td><?php echo $row["SoLuongBan"]; ?></td>
            <td><?php echo $row["SoLuocXem"]; ?></td>
            <td><?php echo $row["TenLoaiSanPham"]; ?></td>
            <td><?php echo $row["TenHangSanXuat"]; ?></td>
            <td>
                <?php
                if (strlen($row["BiXoa"]) > 20)
                    $sMoTa = substr($row["MoTa"], 0, 20) . "...";
                else
                    $sMoTa = $row["MoTa"];
                echo $sMoTa;
                ?>
                <div class="fullMoTa">
                    <?php echo $row["MoTa"]; ?>
                </div>
            </td>
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

            <td>
                <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"] ?>">
                    <button class="btn btn-danger">
                        Khóa
                    </button>
                </a>
                <a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"] ?> ">
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