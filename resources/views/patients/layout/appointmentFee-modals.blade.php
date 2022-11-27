<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="appointmentFee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Appointment Fee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="appointmentFeePaymentForm">
            @csrf
            <input type="hidden" name="payment_id" id="paymentId">
            <input type="hidden" name="id" id="appointmentId">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="">Jazz Cash</label>
                        <input type="radio" name="payment" value="Jazz cash" class="form-check-input mr-3">
                    </div>
                    <div>
                        <label for="">Bank Payment</label>
                        <input type="radio" name="payment" value="Bank" class="form-check-input mr-3">
                    </div>
                    <div>
                        <label for="">Eassy Paisa</label>
                        <input type="radio" name="payment" value="Eassy Paisa" class="form-check-input mr-3">
                    </div>
                </div>
            <div class="mb-3">
                <label for="">Appointment Fee</label>
                <input type="text" class="form-control" id="patientAppointmentFee" placeholder="Enter your account number" readonly>
            </div>
            <div class="mb-3">
                <label for="">Account number</label>
                <input type="text" class="form-control" name="account_number" id="acountNumberId" placeholder="Enter your account number">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="payAppointmentFeeButton">Pay</button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
