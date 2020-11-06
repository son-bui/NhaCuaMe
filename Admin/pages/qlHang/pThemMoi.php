<div class="modal fade" id="addNewManufacturer" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm Hãng Sản Xuất</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Body-->
      <div class="modal-body">
        <form action="pages/qlHang/xlThemMoi.php" method="get" onsubmit="return KiemTra();">
          <fieldset>
            <div class="form-group">
              <label for="">Tên hãng sản xuất</label>
              <input class="form-control form-control-sm" type="text" name="txtTen" id="txtTen">
              <!-- Modal footer-->
              <div class="modal-footer d-flex">
                <input type="submit" class="btn btn-primary btn-default" value="Thêm mới">
              </div>
            </div>
            <div id="error"></div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function KiemTra()
   {
       var ten = document.getElementById("txtTen");
       var err = document.getElementById("error");
       if(ten.value == "")
       {
           err.innerHTML = "Tên hãng sản xuất không được rỗng";
           ten.focus();
           return false;
       }
       else
           err.innerHTML = "";

        return true;
   }
</script>