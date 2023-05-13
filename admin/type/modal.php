<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_type" method="post" accept-charset="utf-8">
          <div class="row">
            <div class="form-group col-md-12">
              <select name="cat_id" id="cat_id" class="form-control" required>
                <option value="">--- Category Choose ---</option>
                <?php $sql = mysqli_query($conn,"SELECT * FROM category_db  
                  Order by CAT_ID DESC");
                while ($rs = mysqli_fetch_assoc($sql)) {
                  echo "<option value=\"".$rs['CAT_ID']."\">".$rs['CAT_Name1']."</option>";
                } ?>  
              </select>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="type_name1" id="type_name1" class="form-control" placeholder="Type Name1" required>
              <input type="text" name="id" id="type_id" class="form-control" hidden>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="type_name2" id="type_name2" class="form-control" placeholder="Type Name2">
            </div>  
          </div>
          <div  class="modal-footer">
            <div class="spinner-grow spinner-grow-sm text-warning spin_update"></div>
            <div class="spinner-grow text-success spin_update" style="width:20px; height:20px;"></div>
            <div class="spinner-grow text-danger spin_update"></div>
            <button type="submit" id="btn_update" class="btn btn-info">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>