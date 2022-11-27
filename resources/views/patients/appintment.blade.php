@extends('patients.layout.master')
@section('content')
    <div class="container mt-5">
        <a href="{{ route('home') }}"><button class="btn btn-danger">Go Back</button></a>
        <h1>Appointment Form</h1>
        <form action="{{ route('patient.appointment.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="Department" class=""><strong>Department</strong></label>
                <select class="form-select" id="departmentId">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Rooms" class=""><strong>Rooms</strong></label>
                <select class="form-select" id="roomId">
                    <option value="">Select Room</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Doctor" class=""><strong>Doctor</strong> </label>
                <select class="form-select" id="doctorId" name="doctor_id">
                    <option value="">Select Doctor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><strong>Message</strong></label>
                <textarea class="form-control" name="message" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success" id="submit">Sumbit</button>
            </div>
        </form>
        <hr>
        <h1>My Appointments</h1>
        <table class="table table-striped" id="appointment">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Room</th>
                    <th scope="col">Department</th>
                    <th scope="col">Message</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->user->name ?? '' }}</td>
                        <td>{{ $appointment->doctor->user->name ?? '' }}</td>
                        <td>{{ $appointment->doctor->room->name ?? '' }}</td>
                        <td>{{ $appointment->doctor->room->department->name ?? '' }}</td>
                        <td>
                            <div style="word-wrap: break-word; width:300px">
                                {{ $appointment->message }}

                            </div>
                        </td>
                        <td>
                            {{ $appointment->created_at }}
                        </td>
                        <td>
                             {{ $appointment->status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {


            $('#appointment').DataTable();



            $('#departmentId').on('change', function() {
                let departmentId = $('#departmentId').val();
                $('#roomId').html('');
                let url = '{{ route('admin.get.room.by.department', ':departmentId') }}';
                url = url.replace(':departmentId', departmentId);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#roomId').append(
                                `<option value="${value.id}">${value.name}</option>`
                            )
                            $('#roomId').val(`${value.id}`).trigger('change');
                        });
                    },

                });
            });
            $('#roomId').on('change', function() {
                let roomId = $('#roomId').val();
                $('#doctorId').html('');
                let url = '{{ route('patient.get.doctor', ':roomId') }}';
                url = url.replace(':roomId', roomId);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {

                        $.each(data, function(key, value) {
                            if (!value) {
                                alert('Rooms or Doctors not Available');
                            } else {
                                $('#doctorId').append(
                                    `<option value="${value.user_id}">${value.user.name}</option>`
                                )
                            }

                        });


                    },

                });
            });

        });
    </script>
@endsection
