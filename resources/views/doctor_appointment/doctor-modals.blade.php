<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="viewAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <tr>
                    <td>Doctor Name</td>
                    <strong id="doctorName">Name</strong>
                </tr>
            </div>

            <div>
                <tr>
                    <td>Patient Name</td>
                    <strong id="patientName"></strong>
                </tr>
            </div>

            <div>
                <tr>
                    <td>Room</td>
                    <strong id="roomName"></strong>
                </tr>
            </div>
            <div>
                <tr>
                    <td>Department</td>
                    <strong id="departmentName"></strong>
                </tr>
            </div>
            <div>
                <tr>
                    <td>Status</td>
                    <strong id="currentStatus" class="badge badge-warning"></strong>
                </tr>
            </div>
            <div>
                <tr>
                    <td>Appointment Date</td>
                    <strong id="appointmentDate"></strong>
                </tr>
            </div>
            <div>
                <tr>
                    <td>Message</td>

                        <p id="appointmentMessage"></p>


                </tr>
            </div>
            <div class="mb-3">
                <form id="AppointmentForm">
                    @csrf
                    <input type="hidden" name="id" id="appointmentId">
                    <input type="hidden" name="status" id="formAppointmentStatus">
                        <div class="form-group" id="paymentFee">
                            <label for="">Appointment Fee</label>
                            <input type="number" name="payment_fee" class="form-control">
                        </div>
                        <span class="error_payment_fee text-danger"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="appointmentApproved">Approved</button>
                        <button type="button" class="btn btn-danger" id="appointmentReject">Reject</button>
                      </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </div>
