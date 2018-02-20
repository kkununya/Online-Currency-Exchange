
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left" id="modalLabel">Add New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userForm">
          <div class="form-group">
            <label for="employee_id">Employee ID:</label>
            <input id="employee_id" name="employee_id" type="number" class="form-control" maxlength="8">
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" name="name" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input id="email" name="email" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control">
              <option value="">Select Role</option>
              @foreach($roles as $role)
              <option value={{ $role->id }}>{{ $role->name }}</option>
              @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="closeButton" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="AddButton" type="button" class="btn btn-success" data-dismiss="modal">Add User</button>
        <button id="editButton" type="button" class="btn btn-success" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>