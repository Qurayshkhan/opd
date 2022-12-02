@extends('admin.layouts.admin-master')
@section('content')
    @include('admin.User_managment.user-managment-modal')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    <button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#roleModal"
                        id="addRole">Add Roles</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="roleIdTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->created_at}}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#roleModal"
                                        onclick="populateRoles('{{$role->id}}', '{{$role->name}}')">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Edit doctor
        let populateRoles = (role_id, role_name) => {
            $('#roleTitle').html("Edit Role");
            $('#roleId').val(role_id);
            $('#roleName').val(role_name);
        }
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('#roleIdTable').DataTable();

            //initilize doctor dataTable
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //Modal Title
            $('#addRoles').click(function() {
                $('#rolesTitle').html("Add doctor");
                $('#roles-form')[0].reset();
            });


            // Add doctor
            $('#roles-form').submit(function(e) {
                e.preventDefault();
                let form = $('#roles-form').serialize();
                let button = $('#roleSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{ route('admin.store.roles') }}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#roles-form')[0].reset();
                        $('#roleModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showConfirmButton: true,

                        }).then((response) => {
                            window.location.reload();
                        })

                    },
                    error: function(error)
                    {
                        button.removeClass('spinner-border');
                        $.each(error.responseJSON.errors, function(key, value){
                            $('#error_' + key).html(value);

                        });

                    }
                });
            });

        });
    </script>
@endsection
