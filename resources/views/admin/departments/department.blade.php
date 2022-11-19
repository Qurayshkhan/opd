@extends('admin.layouts.admin-master')
@section('content')
    @include('admin.partials.add-department-modal')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Departments</h6>
                    <button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#departmentModal"
                        id="addDepartment">Add Department</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="department" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#departmentModal"
                                            onclick="populateDepartment('{{ $department->id }}', '{{ $department->name }}')">Edit</button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Edit Department
        let populateDepartment = (department_id, department_name) => {
            $('#departmentTitle').html("Edit Department");
            $('#departmentId').val(department_id);
            $('#departmentName').val(department_name);
        }
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {



            //initilize department dataTable
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#department').DataTable();


            //Modal Title
            $('#addDepartment').click(function() {
                $('#departmentTitle').html("Add Department");
                $('#departmentId').val(null);
                $('#departmentName').val(null);
            });


            // Add Department
            $('#department-form').submit(function(e) {
                e.preventDefault();
                let form = $('#department-form').serialize();
                let button = $('#departmentSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{ route('admin.department.store') }}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#department-form')[0].reset();
                        $('#departmentModal').modal('hide');
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
                        console.log(error);
                    }
                });
            });


        });
    </script>
@endsection
