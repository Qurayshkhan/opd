@extends('admin.layouts.admin-master')
@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="transactionsTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Payment Fee</th>
                                <th>Account Number</th>
                                <th>Payment status</th>
                                <th>Created At</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->appointment->patient->user->name}}</td>
                                <td>
                                    {{$transaction->appointment->doctor->user->name}}
                                </td>
                                <td>
                                  Rs {{$transaction->payment_fee}}
                                </td>
                                <td>
                                    {{$transaction->account_number}}
                                </td>
                                <td>
                                    {{$transaction->payment_status}}
                                </td>
                                <td>
                                    {{$transaction->created_at}}
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
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
    $('#transactionsTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
        ]
    });
} );
</script>
@endsection


