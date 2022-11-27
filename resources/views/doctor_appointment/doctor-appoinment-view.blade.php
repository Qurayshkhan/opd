@extends('admin.layouts.admin-master')
@section('content')
    @include('doctor_appointment.doctor-modals')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Doctors</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Patient</th>
                                <th>Room</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->doctor->user->name }}</td>
                                    <td>{{ $appointment->patient->user->name }}</td>
                                    <td>{{ $appointment->doctor->room->name }}</td>
                                    <td>{{ $appointment->doctor->room->department->name }}</td>
                                    <td>
                                        @php
                                            if ($appointment->status == 'pending') {
                                                echo '<span class="badge badge-warning">' . $appointment->status . '</span>';
                                            } elseif ($appointment->status == 'approved') {
                                                echo '<span class="badge badge-success">' . $appointment->status . '</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">' . $appointment->status . '</span>';
                                            }
                                        @endphp
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#viewAppointment"
                                            onclick="appointmentDetails({{ $appointment->id }} , '{{ $appointment->doctor->user->name }}', '{{ $appointment->patient->user->name }}', '{{ $appointment->doctor->room->name }}', '{{ $appointment->doctor->room->department->name }}', '{{ $appointment->message }}', '{{ $appointment->status }}', '{{ $appointment->created_at }}')">
                                            view
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let appointmentDetails = (appointment_id, doctor_name, patient_name, room_name, department_name,
            appointment_message, current_status, created_at) => {
            $('#appointmentId').val(appointment_id);
            $('#doctorName').html(doctor_name);
            $('#patientName').html(patient_name);
            $('#roomName').html(room_name);
            $('#departmentName').html(department_name);
            $('#currentStatus').html(current_status);
            $('#appointmentMessage').html(appointment_message);
            $('#appointmentDate').html(created_at);
            $('#formAppointmentStatus').val(current_status);
            if (current_status != "pending") {
                $('#appointmentReject').attr("hidden", true);
                $('#appointmentApproved').attr("hidden", true);
                $('#paymentFee').attr('hidden', true);
            } else {
                $('#appointmentReject').attr("hidden", false);
                $('#appointmentApproved').attr("hidden", false);
                $('#paymentFee').attr("hidden", false);

            }
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#appointmentApproved').click(function(e) {
                e.preventDefault();
                let appointmentId = $('#appointmentId').val();
                let url = '{{ route('doctor.approve.appointment', ':appointmentId') }}';
                url = url.replace(':appointmentId', appointmentId);
                let form = $('#AppointmentForm').serialize();
                Swal.fire({
                    title: 'Do you want to approved?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form,
                        success: function(data) {
                            if (result.isConfirmed) {
                                Swal.fire(data);
                                window.location.reload();
                            }

                        },
                        error:function(error)
                        {
                            $.each(error.responseJSON.errors, function(key, value){
                            $('.error_' + key).html(value);

                        });
                        }
                    })

                })
            });
            $('#appointmentReject').click(function(e) {
                e.preventDefault();
                let appointmentId = $('#appointmentId').val();
                let url = '{{ route('doctor.rejected.appointment', ':appointmentId') }}';
                url = url.replace(':appointmentId', appointmentId);
                let form = $('#AppointmentForm').serialize();
                Swal.fire({
                    title: 'Do you want to rejected?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form,
                        success: function(data) {
                            if (result.isConfirmed) {
                                Swal.fire(data);
                                window.location.reload();
                            }

                        }
                    })

                })
            });
        });
    </script>
@endsection
