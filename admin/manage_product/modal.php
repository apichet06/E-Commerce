<div class="modal fade" id="preview_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Preview Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_detail" method="post" accept-charset="utf-8">
          <input type="text" name="id" class="form-control" id="id_detail" hidden>
          <textarea class="edit2" name="pd_detail"><div class="data_detail"></div></textarea>
          <div class="modal-footer">
            <div class="spinner-grow spinner-grow-sm text-warning spin_up"></div>
            <div class="spinner-grow text-success spin_up" style="width:20px; height:20px;"></div>
            <div class="spinner-grow text-danger spin_up"></div>
            <button type="submit" id="update_preview_detail" class="btn btn-info ">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--แสดงข้อมูลรายการ Detail ของ สินค้า-->

<div class="modal fade" id="preview_images" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Preview Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=" data_images"> 
          <!--แสดงข้อมูลรายการ Detail ของ สินค้า-->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="update_cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="post" class="update_cat" accept-charset="utf-8">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" name="name" id="cat_name" class="form-control" placeholder="Category Name" required>
              <input type="text" name="id" id="cat_id" class="form-control" placeholder="Category Name" hidden>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="number" id="cat_number" class="form-control" placeholder="Category  Number ID" >
            </div>
          </div>

          <div class="modal-footer">
           <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
           <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
           
         </div>
       </form>
     </div>

   </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="update_pro" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputState">Type Product <strong class="text-danger"> * </strong></label>
              <select name="type_id" id="type_id" class="form-control select2_type" style="width: 100%" required>
                <option value="">--- Type ---</option>
                <?php $sql = mysqli_query($conn,"SELECT * FROM type_db")or die(mysqli_error($conn));
                while ($rs = mysqli_fetch_assoc($sql)) { ?>
                  <option value="<?=$rs['TYPE_ID']?>"><?=$rs['TYPE_Name1']?></option>
                <?php } ?>
              </select>
              <input type="text" name="id" class="form-control" id="id_pro" hidden="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Thai ProductName <strong class="text-danger"> * </strong></label>
              <input type="text" class="form-control" name="pd_name1" id="pd_name1" placeholder="Product Name Thai" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">English ProductName </label>
              <input type="text" class="form-control" name="pd_name2" id="pd_name2" placeholder="Product Name English" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Price <strong class="text-danger"> * </strong></label>
              <input type="number" class="form-control" name="pd_pirce" id="pd_price" placeholder="Price" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">Discount %</label>
              <input type="number" class="form-control" name="pd_discount" id="pd_discount" placeholder="Discount 10 20 30" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">Stock <strong class="text-danger"> * </strong></label>
              <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">PriceSell</label>
              <input type="number" class="form-control" name="pd_pricesell" id="pd_pricesell" placeholder="PriceSell" >
            </div>

            <div class="form-group col-md-6">
              <label for="inputState">Promotion</label>
              <input type="text" class="form-control" name="pd_promotion" id="pd_promotion" placeholder="Promotion" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Condition </label>
              <input type="text" class="form-control" name="pd_condition" id="pd_condition" placeholder="Condition" >
            </div>
            <div class="form-group col-md-12">
              <div class="custom-file-container" data-upload-id="myUniqueUploadIdUpdate">
                <label>Limti images 8 to Uploads<a href="javascript:void(0)"  class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
                </label>
                <label class="custom-file-container__custom-file" >
                  <input type="file" id="clear_updateimg" class="custom-file-container__custom-file__custom-file-input" name="file[]" accept="image/*" multiple aria-label="Choose File" >
                  <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview mx-auto"  style=" 
                height: 175px; width : 200px;"></div>
              </div>
            </div>

            <div class="form-group col-md-12">
              <div class="progress progress_up" style="height: 12px;">
                <div  class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                style="width:0%" id="pro_up"><span  id="percen_up">0%</span></div>
              </div>
            </div>
          </div>

          <div class="modal-footer"> 
            <div class="spinner-grow spinner-grow-sm text-warning spin_up"></div>
            <div class="spinner-grow text-success spin_up" style="width:20px; height:20px;"></div>
            <div class="spinner-grow text-danger spin_up"></div>
            <button type="submit" class="btn btn-info" id="btnpro_up">Update</button>
            <button type="button" class="btn btn-secondary clear_updateimg" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

