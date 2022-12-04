@extends('admin.layouts.admin-master')
@section('content')
@include('admin.User_managment.assign-role-modal')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Assign Roles</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="roleIdTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Created at</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name ?? ''}}</td>
                                    <td>{{$user->roles->first()->name ?? ''}}</td>
                                    <td>{{$user->created_at ?? ''}}</td>
                                    {{-- <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#roleModal"
                                        onclick="populateAssignRoles('{{$user->id ?? ''}}', '{{$user->name ?? ''}}', '{{$user->roles->first()->id ?? ''}}')">Assign Role</button>
                                    </td> --}}
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
        //Assign roles
        let populateAssignRoles = (user_id, user_name, role_id) => {
            $('#roleTitle').html("Assign Role");
            $('#userId').val(user_id);
            $('#userName').val(user_name);
            $('#selectRole').val(role_id).trigger('change');
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

            // Add doctor
            $('#roles-form').submit(function(e) {
                e.preventDefault();
                let userId = $('#userId').val();
                let form = $('#roles-form').serialize();
                let button = $('#roleSpinner');

                let url = '{{ route('admin.assign.role', ':userId') }}';
                url = url.replace(':userId', userId);
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: url,
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
