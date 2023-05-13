<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="post" accept-charset="utf-8" id="update_user">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">User Name</label>
              <input type="text" name="u_name" id="u_name" class="form-control" placeholder="User Name">
              <input type="text" name="id" id="iduser" class="form-control" hidden="">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Last Name</label>
              <input type="text" name="u_lname" id="u_lname" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">User Login</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="User Login">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">--- Choose Status ---</option>
                <option value="admin">Admin</option>
                <option value="sell">Sell</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <div class="spinner-grow spin_update spinner-grow-sm text-warning"></div>
            <div class="spinner-grow spin_update text-success" style="width:20px; height:20px;"></div>
            <div class="spinner-grow spin_update text-danger"></div>
            <!-- <button type="reset" class="btn btn-secondary">Clear</button> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="spin_update" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>