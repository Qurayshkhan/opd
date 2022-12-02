<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roleTitle">Add Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="roles-form">
            @csrf
            <input type="hidden" name="id" id="roleId">
            <div>
                <label for="DepartmentLable">Role Name</label>
                <input type="text" class="form-control" name="name" id="roleName" placeholder="Enter Role Name">
            </div>
            <span id="error_name" class="text-danger"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="roleSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>

      </div>
    </div>
  </div>








<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="permissionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="permissionTitle">Add Permission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="permission-form">
            @csrf
            <input type="hidden" name="id" id="permissionId">
            <div>
                <label for="DepartmentLable">Permission Name</label>
                <input type="text" class="form-control" name="name" id="permissionsName" placeholder="Enter Role Name">
            </div>
            <span id="error_name" class="text-danger"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="permissionSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>

      </div>
    </div>
  </div>



















