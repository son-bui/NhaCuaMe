<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm Sản Phẩm</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body-->
      <div class="modal-body">
        <form action="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
          <fieldset>
            <div>
              <label for="">Tên sản phẩm</label>
              <input class="form-control form-control-sm" type="text" name="txtTen" id="txtTen" />
              <i id="errTen"></i>
            </div>
            <div class="form-group">
              <label for="">Hãng sản xuất</label>
              <select class="form-control form-control-sm" name="cmbHang" id="">
              <?php
                $sql = "SELECT *FROM HangSanXuat WHERE BiXoa=0";
                $result = DataProvider::ExecuteQuery($sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Hình</label>
              <input type="file" name="fHinh" />
            </div>
            <div class="form-group">
              <label for="">Giá</label>
              <input class="form-control form-control-sm" type="text" name="txtGia" id="txtGia" />
              <i id="errGia"></i>
            </div>
            <div class="form-group">
              <label for="">Số lượng</label>
              <input class="form-control form-control-sm" type="text" name="txtTon" id="txtTon" />
              <i id="errTon"></i>
            </div>
            <div class="form-group">
              <label for="">Mô tả</label>
              <textarea class="form-control form-control-sm" name="txtMoTa"></textarea>
            </div>
          </fieldset>
          <!-- Modal footer-->
          <div class="modal-footer d-flex">
            <input type="submit" class="btn btn-primary btn-default" value="Thêm mới">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



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