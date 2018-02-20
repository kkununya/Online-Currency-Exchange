
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left" id="exampleModalLabel">Are you sure to delete this user?</h5>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="padding: 10px;">
        <span id="employee_id_del"></span>
          <span id="user_id"></span><br>
          <span id="name_del"></span><br>
          <span id="email_del"></span><br>
          <span id="role_del"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="deleteButton" type="button" class="btn btn-danger" data-dismiss="modal">Delete User</button>
      </div>
    </div>
  </div>
</div>