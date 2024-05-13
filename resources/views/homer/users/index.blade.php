@extends('layouts.app')

@section('content')
    <div class="">
        @include("nisimpo::".config('theme').".users.add_user_modal")

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content">
                <div class="bg-white p-md">
                    <div class="row align-item-center">
                        <div class="col-sm-6">
                            <h1 class="p-0 m-0">Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-success"  style="float: right;" id="btnAddUser">Add User</button>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive  mt-3">
                            <table  class="table  table-striped" id="tableUsers">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  {{--@foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration }}</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->is_active ? "Active":"Inactive"}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                                <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                                    <li class="dropdown-header">Actions</li>
                                                    <li>
                                                        <a href="{{ route('user.show',[$user->id]) }}">
                                                            <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                        </a>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach--}}
                                </tbody>
                            </table>
                            <!--
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Said Khamis</td>
                                    <td>Male</td>
                                    <td>=Active</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                             -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section("scripts")
     <script type="text/javascript">
          $(function (){

              const errorAlert = $("#errorAlert");
              errorAlert.hide();

              let userId, baseURL , method = "";

              const full_name_error = $("#full-name-error");
              const gender_error = $("#gender-error");
              const user_type_error = $("#user-type-error");
              const email_error = $("#email-error");
              const username_error = $("#username-error");
              const password_error = $("#password-error");

              const userModal = $("#userModal");
              const btnAddUser = $("#btnAddUser");

              full_name_error.hide();
              gender_error.hide();
              user_type_error.hide();
              email_error.hide();
              username_error.hide();
              password_error.hide();

              const fullName = $("#full_name");
              const gender = $("#gender");
              const userType = $("#user_type");
              const email = $("#email");
              const username = $("#username");
              const password = $("#password");

              let isActive = false;
              let isAppUser = false;

              const tableUsers = $('#tableUsers').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: {
                      url: '{{ route("users.index") }}',
                      type: 'GET'
                  },
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'full_name', name: 'full_name'},
                      {data: 'email', name: 'email'},
                      {data: 'gender', name: 'gender'},
                      {data: 'action', name: 'action'},
                      /*   {
                          data: 'action',
                          name: 'action',
                          orderable: false,
                          searchable: false,
                          render: function(data, type, row) {
                              return data;
                          }
                      },*/
                  ],
              });

              btnAddUser.on("click", function () {
                  userModal.modal("show");

                  $("#userModal .modal-title").html("Add User");

                   baseURL = "{{ route('user.create') }}";

                   method = "POST";

              });


              const addUserBtn = $('.ladda-button-demo').ladda();

              $(document).on("click", ".check_inputs input[type='checkbox']", function () {
                  const data = $(this);
                  const id = data[0].id;
                  if( id === "is_active"){
                      isActive = $(this).prop('checked');
                  }

                  if( id === "is_app_user"){
                      isAppUser = $(this).prop('checked');
                  }
              })

              addUserBtn.on("click", function (e){
                  e.preventDefault();

                  if( validateFullName() ){
                      full_name_error.show();
                  }else if( validateGender() ){
                      gender_error.show();
                  }else if( validateUserType() ){
                      user_type_error.show();
                  }else  if( validateEmail() ){
                      email_error.show();
                  }else if( validateUsername() ){
                      username_error.show();
                  }else if( validatePassword() ){
                      password_error.show();
                  }else {

                      addUserBtn.ladda( 'start' );

                      const data = {
                          "full_name" : fullName.val(),
                          "gender" : gender.val(),
                          "user_type" : userType.val(),
                          "email" : email.val(),
                          "is_app_user" :  Boolean(isAppUser),
                          "is_active" : Boolean(isActive),
                          "username" : username.val(),
                          "password" : password.val()
                      }

                      console.log("Data");
                      console.log(data);

                      $.ajax({
                          url: baseURL,
                          method: method,
                          data: data,
                          success: function (response) {
                              console.log("response");
                              console.log(response);

                              if(response.status === true){
                                  userModal.modal("hide");
                                  addUserBtn.ladda('stop');
                                  tableUsers.draw();
                              }

                          },
                          error: function (error) {
                              console.log("error");
                              console.log(error.responseJSON.message);
                              const anError = error.responseJSON.message;
                              errorAlert.html(anError).show();
                              addUserBtn.ladda('stop');
                          }
                      })

                  }
              });

              $(document).on("change","#gender, #user_type ", function (){
                  const data = $(this);
                  console.log("Data");
                  console.log(data);
                  const id = data[0].id;

                  if( id === "gender"){
                      if( validateFullName() ){
                          gender_error.show();
                      }else {
                          gender_error.hide();
                      }
                  }

                  if( id === "user_type"){
                      if(validateUserType() ){
                          user_type_error.show();
                      }else {
                          user_type_error.hide();
                      }
                  }

              });


              $(document).on("keyup","#full_name, #username , #email , #password", function (){
                   const data = $(this);
                   console.log("Data");
                   console.log(data);
                   const id = data[0].id;
                   if( id === "full_name"){
                        if( validateFullName() ){
                            full_name_error.show();
                        }else {
                            full_name_error.hide();
                        }
                   }

                   if( id === "username"){
                        if( validateUsername() ){
                            username_error.show();
                        }else {
                            username_error.hide();
                        }
                   }

                  if( id === "email"){
                      if( validateEmail() ){
                          email_error.show();
                      }else {
                          email_error.hide();
                      }
                  }

                  if( id === "password"){
                      if( validatePassword() || method === "POST"){
                          password_error.show();
                      }else {
                          password_error.hide();
                      }
                  }
              });


              $(document).on("click",".editUser", function(){
                  userId = $(this).data("id");
                  userModal.modal("show");
                  $("#userModal .modal-title").html("Update User");
                  const baseUrl = "{{ route('user.edit',['id']) }}".replace("id",userId);

                  baseURL = "{{ route('user.update',['id']) }}".replace("id",userId);

                  method = "PUT";

                  $.ajax({
                    url: baseUrl,
                    method: "GET",
                    dataType: "json",
                  }).done(response => {
                     console.log("Response");
                     console.log(response);
                     console.log(response.gender);


                     fullName.val(response.full_name);
                     username.val(response.username);
                     email.val(response.email);
                     $("#gender option[value='" + response.gender + "']").prop('selected', true);

                     //gender.val(response.gender);
                     userType.val(response.user_type);

                     if( response.is_active  === "ACTIVE"){
                        $("#is_active").prop("checked" , true);
                     }

                     if( response.is_app_user  === 1){
                        $("#is_app_user").prop("checked" , true);
                     }

                  }).fail( error => {
                     console.log("error");
                     console.log(error);
                  });

              });


             $(document).on("click",".deleteUser" ,function () {
                const userId = $(this).data("id");
                swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                   },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: '{{ route("user.delete",["id"]) }}'.replace("id", userId),
                                method: "DELETE",
                                dataType: "json"
                            }).done( response => {
                                if(response.status === true){
                                    swal("Deleted!", "User has been deleted.", "success");
                                    tableUsers.draw();
                                }
                            }).fail( error => {

                            });

                        } else {
                            swal("Cancelled", "User is safe :)", "error");
                        }
                    });
              });

              function validateFullName(){
                  return fullName.val() === "";
              }

              function validateGender(){
                  return gender.val() === "";
              }

              function validateUserType(){
                  return userType.val() === "";
              }

              function validateEmail(){
                  return email.val() === "";
              }

              function validateUsername(){
                  return username.val() === "";
              }


              function validatePassword(){
                  return password.val() === "";
              }

          });

          function clearInputs() {
             $("#full_name").val("");
             $("#gender").val("");
             $("#user_type").val("");
             $("#email").val("");
             $("#username").val("");
             $("#password").val("");
             $("#is_active").prop("checked" , false);
             $("#is_app_user").prop("checked" , false);

             baseURL = " ";
             method = " ";
          }

          //var isShown = userModal.hasClass('in') || userModal.hasClass('show')

          $("#userModal").on("hidden.bs.modal", function(e){
               clearInputs();
          });

     </script>
@endsection


