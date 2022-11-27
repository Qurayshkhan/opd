    @extends('patients.layout.master')
    @section('content')
        @include('patients.layout.appointmentFee-modals')
        <div class="container mt-5">
            <a href="{{ route('home') }}"><button class="btn btn-danger">Go Back</button></a>
            <h1>Appointment Fee</h1>
            <hr>
            <table class="table table-striped" id="appointmentFeeTable">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Room</th>
                        <th scope="col">Department</th>
                        <th scope="col">Appointment Fee</th>
                        <th scope="col">Fee Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointmentFees as $appointmentFee)
                        <tr>
                            <td>{{ $appointmentFee->patient->user->name ?? '' }}</td>
                            <td>{{ $appointmentFee->doctor->user->name ?? '' }}</td>
                            <td>{{ $appointmentFee->doctor->room->name ?? '' }}</td>
                            <td>{{ $appointmentFee->doctor->room->department->name ?? '' }}</td>
                            <td>Rs {{ $appointmentFee->payment[0]->payment_fee ?? '' }}</td>
                            <td>{{ $appointmentFee->payment[0]->payment_status ?? '' }}</td>
                            <td>
                                {{$appointmentFee->created_at}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#appointmentFee"
                                    onclick="appointmentFeeMethod('{{ $appointmentFee->id ?? '' }}', '{{ $appointmentFee->payment[0]->payment_fee ?? '' }}', '{{ $appointmentFee->payment[0]->id ?? ''}}', '{{ $appointmentFee->payment[0]->payment_status ?? '' }}')">
                                    Pay
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script>
            function appointmentFeeMethod(appointment_id, patient_appointment_fee, payment_id, payment_status) {
                $('#appointmentId').val(appointment_id);
                $('#patientAppointmentFee').val(patient_appointment_fee);
                $('#paymentId').val(payment_id);

                if (payment_status != "unpaid") {
                    $('#payAppointmentFeeButton').attr('hidden', true)
                }else{
                    $('#payAppointmentFeeButton').attr('hidden', false)
                }


            }
        </script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#appointmentFeeTable').DataTable();
                $('#payAppointmentFeeButton').on('click', function(e) {

                    e.preventDefault();
                    let paymentValue = $("input[name=payment]:checked").val();
                    let appointmentIdValue = $('#appointmentId').val()
                    let paymentIdValue = $('#paymentId').val()
                    let accountNumberId = $('#acountNumberId').val()
                    $.ajax({
                        type: "POST",
                        url: "{{ route('patient.pay.appointment.fee') }}",
                        data: {
                            id: appointmentIdValue,
                            payment_id: paymentIdValue,
                            account_number: accountNumberId,
                            payment: paymentValue,
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: data,
                                showConfirmButton: true,
                            }).then((response) => {
                                window.location.reload();
                            });
                        }
                    })
                });



            });
        </script>
    @endsection
