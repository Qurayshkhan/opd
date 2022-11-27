@extends('admin.layouts.admin-master')
@section('content')
    @include('admin.partials.add-department-modal')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rooms</h6>
                    <button class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target="#roomModal"
                        id="addRoom">Add Room</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="room" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rooms as $room)

                                <tr>
                                    <td>{{ $room->name }}</td>
                                    <td>{{ $room->department->name }}</td>
                                    <td>{{ $room->created_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#roomModal"
                                            onclick="populateRoom('{{ $room->id }}', '{{ $room->name }}', {{$room->department->id}})">Edit</button>
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
        //Edit Room
        let populateRoom = (room_id, room_name, department_id) => {
            $('#roomTitle').html("Edit Room");
            $('#roomId').val(room_id);
            $('#roomName').val(room_name);
            $('#selectDepartmentId').val(department_id).trigger('change');
        }
    </script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {



            //initilize room dataTable
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#room').DataTable();


            //Modal Title
            $('#addRoom').click(function() {
                $('#roomTitle').html("Add Room");
                $('#room-form')[0].reset();

            });


            // Add rooms
            $('#room-form').submit(function(e) {
                e.preventDefault();
                let form = $('#room-form').serialize();
                let button = $('#roomSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{route('admin.room.store')}}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#room-form')[0].reset();
                        $('#roomModal').modal('hide');
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
                        $.each(error.responseJSON.errors, function(key, value){
                            $('.error_' + key).html(value);
                        });
                    }
                });
            });


        });
    </script>
@endsection
