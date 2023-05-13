<!-- Modal -->
<div class="modal fade" id="update_delivery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delivery Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update"  method="Post" accept-charset="utf-8">
          <input type="text" name="po_id" id="po_id" class="form-control" hidden>
          <div class="form-group col-md-12">
            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
              <label>Upload Images<strong class="text-danger"> * </strong> <a href="javascript:void(0)"  class="custom-file-container__image-clear" title="Clear Image">Cancel <i class="fa fa-ban"></i></a>
              </label>
              <label class="custom-file-container__custom-file clear_insert" >
                <input type="file" id="clear" class="custom-file-container__custom-file__custom-file-input" name="file" accept="image/*" aria-label="Choose File" required>
                <span class="custom-file-container__custom-file__custom-file-control"></span>
              </label>
              <div class="custom-file-container__image-preview mx-auto"  style="height: 175px; width: 200px;"></div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="progress" style="height: 12px;">
              <div  class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
              style="width:0%" id="pro_in"><span  id="percen">0%</span></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary clear_insert " id="btn_c" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn_in">Save changes</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>