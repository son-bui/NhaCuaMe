<a href="index.php?c=3&a=3">
    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#addNewSpecies">
        Thêm Loại Sản Phẩm
    </a>
</a>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th width="10%">STT</th>
            <th width="50%"> Tên loại sản phẩm</th>
            <th width="20%">Tình trạng</th>
            <th width="20%">Thao tác</th>
        </tr>
    </thead>

    <?php
    $sql = "SELECT * FROM LoaiSanPham";
    $result = DataProvider::ExecuteQuery($sql);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row["TenLoaiSanPham"]; ?></td>

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
                <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"] ?>">
                    <button class="btn btn-danger">
                        Khóa
                    </button>
                </a>
                <a href="index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"] ?> ">
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