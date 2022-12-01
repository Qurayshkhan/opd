@extends('admin.layouts.admin-master')
@section('content')
@extends('admin.transactions.patient-modal')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="patientTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Patient Email</th>
                                <th>Patient Phone</th>
                                <th>Patient Cnic</th>
                                <th>Patient Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>
                                    {{$patient->user->name}}
                                </td>
                                <td>
                                    {{$patient->user->email}}
                                </td>
                                <td>
                                    {{$patient->phone}}
                                </td>
                                <td>
                                    {{$patient->cnic}}
                                </td>
                                <td>
                                    {{$patient->gender}}
                                </td>
                                <td>
                                    <button class="btn btn-success"  data-toggle="modal"
                                    data-target="#patientsModal"
                                    onclick="populatePatient('{{$patient->user->id}}', '{{$patient->user->name}}', '{{$patient->user->email}}', '{{$patient->phone}}', '{{$patient->cnic}}', '{{$patient->gender}}')" >Edit</button>
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
        function populatePatient (patient_id, user_name, user_email, patient_phone, patient_cnic, patient_gender){
             $('#patientId').val(patient_id);
             $('#adminpatientName').val(user_name);
             $('#adminpatientEmail').val(user_email);
             $('#adminpatientPhone').val(patient_phone);
             $('#adminpatientCnic').val(patient_cnic);
             $('#adminpatientGender').val(patient_gender);
        }
     </script>
@endsection
@section('script')

<script>
    $(document).ready(function(){
        $('#patientTable').DataTable();
        $('#patient-form').submit(function(e) {
                e.preventDefault();
                let form = $('#patient-form').serialize();
                let button = $('#patientSpinner');
                button.addClass('spinner-border');
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "{{ route('admin.patient.qoue.update') }}",
                    success: function(response) {
                        button.removeClass('spinner-border');
                        $('#patient-form')[0].reset();
                        $('#patientsModal').modal('hide');
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

    });
</script>
@endsection


