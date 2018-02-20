
@extends('adminlte::page')

@section('htmlheader_title')
	User
@endsection

@section('contentheader_title')
  User
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Order List</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-success" 
                data-toggle="modal" data-target="#modal" data-value="create">
            <center>
              New User
              <i class="fa  fa-plus"></i>
            </center>
          </button>
          <div class="form-group pull-right" style="margin-left: 5px;">
              <select name="currency" id="currency" class="form-control">
              <option value="">All Role</option>
                @foreach($roles as $role)
                  <option value={{ $role->name }}>{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered" id="user_table">
          <thead>
            <tr>
              <th class="text-center">Employee ID</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Role</th>
              <th class="text-center">Edit</th>
              <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td class="text-center">{{ $user->employee_id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @foreach($user->roles as $role)
              <td>{{ $role->name }}</td>
              <td class="text-center">
                <button type="button" class="btn btn-primary btn-sm" 
                data-toggle="modal" data-target="#modal" data-value={{ $user->id }}>
                  <center><i class="fa fa-edit"></i></center>
                </button>
              </td>
              <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm" 
                data-toggle="modal" data-target="#modal-delete" data-value={{ $user->id }}>
                  <center><i class="fa fa-trash"></i></center>
                </button>
              </td>
            </tr>
            @endforeach
            @endforeach
          </tbody>
          <tfoot></tfoot>
        </table>
      </div>
      <div class="box-footer">
      
      </div>
    </div>
  </section>

  @include('user.modal')
  @include('user.modal-delete')

@endsection

@section('javascript')
 <script>
 $(document).ready(function(){
  var js_data = '<?php echo json_encode($users); ?>';
  var userData = JSON.parse(js_data);

  var table = $('#user_table').DataTable();

  $('#currency').on('change', function(){
        table.columns(3).search(this.value).draw();
      });

  var user;
  var role_id;

  $('#modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget) // Button that triggered the modal
    var value = button.data('value')
    var modal = $(this)

    if(value == 'create'){
      $('#modalLabel').text('Add New User');
      $('#AddButton').removeClass('hidden');
      $('#editButton').addClass('hidden');
    }else{
      $('#AddButton').addClass('hidden');
      $('#editButton').removeClass('hidden');
      user = $.grep(userData, function(e){return e.id == value;})[0];
      role_id = user['roles'][0]['id'];
      $('#modalLabel').text('Edit User');
      $('#employee_id').val(user['employee_id']);
      $('#name').val(user['name']);
      $('#email').val(user['email']);
      $('#role').val(role_id);
    }
   });
   $('#modal').on('hidden.bs.modal', function(event){
      $('#name').val("");
      $('#email').val("");
      $('#role').val("");
      $('#employee_id').val("");
   });

   $('#AddButton').on('click', function(){
     var myData = $('#userForm').serializeArray();
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/user',
        method: "POST",
        data: myData,
        success: function(response){
          location.reload();
          console.log(response);
        },
        error: function(response){
          console.log(response);
        }
      });
   });

   $('#editButton').on('click', function(){
    var myData = $('#userForm').serializeArray();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/user/'+ user['id'],
        method: "PUT",
        data: myData,
        success: function(response){
          location.reload();
          console.log(response);
        },
        error: function(response){
          console.log(response);
        }
      });
   });

   $('#modal-delete').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget) // Button that triggered the modal
      var value = button.data('value')
      var modal = $(this)
      user = $.grep(userData, function(e){return e.id == value;})[0];
      role_id = user['roles'][0]['id'];

      $('#employee_id_del').text('Employee ID : '+user['employee_id']);
      $('#name_del').text('Name : '+user['name']);
      $('#email_del').text('E-mail : '+user['email']);
      $('#role_del').text('Role : '+user['roles'][0]['name']);

      $('#deleteButton').on('click', function(){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/user/'+ user['id'],
          method: "DELETE",
          success: function(response){
            location.reload();
            console.log(response);
          },
          error: function(response){
            console.log(response);
          }
        });
      });

   });
  });
 </script>
@endsection

@section('stylesheet')
@endsection