@extends('patients.layout.master')
@section('content')
    <div class="container mt-5">
        <a href="{{ route('home') }}"><button class="btn btn-danger">Go Back</button></a>
        <h1>Appointment Form</h1>
        <form action="">
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
                <select class="form-select" id="doctorId">
                    <option value="">Select Doctor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><strong class="text-light">Message</strong></label>
                <textarea class="form-control" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" id="submit">Sumbit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
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
                            }else {
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
