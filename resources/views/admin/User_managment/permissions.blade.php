@extends('admin.layouts.admin-master')
@section('content')
    @include('admin.User_managment.user-managment-modal')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    <button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#permissionsModal"
                        id="addPermission">Add Permissions</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="permissionTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#permissionsModal"
                                        onclick="populatePermissions('{{ $permission->id }}', '{{ $permission->name }}')">Edit</button>
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
        let populatePermissions = (permission_id, permission_name) => {
            $('#permissionTitle').html("Edit Permission");
            $('#permissionId').val(permission_id);
            $('#permissionsName').val(permission_name);
        }
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('#permissionTable').DataTable();

            //initilize doctor dataTable
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //Modal Title
            $('#addPermission').click(function() {
                $('#permissionTitle').html("Add Permissions");
                $('#permission-form')[0].reset();
            });


            // Add doctor
            $('#permission-form').submit(function(e) {
                e.preventDefault();
                let form = $('#permission-form').serialize();
                let button = $('#permissionSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{ route('admin.store.permission')}}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#permission-form')[0].reset();
                        $('#permissionsModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            showConfirmButton: true,

                        }).then((response) => {
                            window.location.reload();
                        })

                    },
                    error: function(error) {

                        button.removeClass('spinner-border');
                        $.each(error.responseJSON.errors, function(key, value) {
                            console.log(value);
                            $('#error_' + key).html(value);

                        });

                    }
                });
            });

        });
    </script>
@endsection
