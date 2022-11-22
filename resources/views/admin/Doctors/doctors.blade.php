@extends('admin.layouts.admin-master')
@section('content')
    @include('admin.partials.add-department-modal')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Doctors</h6>
                    <button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#doctorModal"
                        id="adddoctor">Add doctor</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="doctor" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assigned Room</th>
                                <th>Room Department </th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->user->name }}</td>
                                    <td>{{ $doctor->user->email }}</td>
                                    <td>{{ $doctor->room->name }}</td>
                                    <td>{{ $doctor->room->department->name }}</td>
                                    <td>{{ $doctor->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#doctorModal"
                                            onclick="populatedoctor('{{ $doctor->user->id }}','{{$doctor->user->name}}', '{{$doctor->user->email}}', '{{$doctor->room->id}}', {{$doctor->room->department->id}})">Edit</button>
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
        //Edit doctor
        let populatedoctor = (doctor_id, doctor_name, doctor_email, department_id) => {
            $('#doctorTitle').html("Edit doctor");
            $('#doctorId').val(doctor_id);
            $('#doctorName').val(doctor_name);
            $('#doctorEmail').val(doctor_email);
            $('#doctorDepartmentId').val(department_id).trigger('change');
        }
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {



            //initilize doctor dataTable
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#doctor').DataTable();


            //Modal Title
            $('#adddoctor').click(function() {
                $('#doctorTitle').html("Add doctor");
                $('#doctor-form')[0].reset();
            });


            // Add doctor
            $('#doctor-form').submit(function(e) {
                e.preventDefault();
                let form = $('#doctor-form').serialize();
                let button = $('#doctorSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{ route('admin.doctor.store') }}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#doctor-form')[0].reset();
                        $('#doctorModal').modal('hide');
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
                            $('.error_' + key).html(value);

                        });

                    }
                });
            });

            $('#doctorDepartmentId').on('change', function(){
                let departmentId = $('#doctorDepartmentId').val();
                $('#doctorRoomId').html('');
                let url = '{{route("admin.get.room.by.department", ":departmentId")}}';
                url = url.replace(':departmentId', departmentId);
                $.ajax({
                    type:"GET",
                    url:url,
                    success: function (data)
                    {
                        console.log(data);
                        $.each(data, function(key, value){
                            $('#doctorRoomId').append(`<option value="${value.id}">${value.name}</option>`)
                        })
                    },

                });
            });

        });
    </script>
@endsection
