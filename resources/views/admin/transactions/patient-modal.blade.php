<div class="modal fade" id="patientsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roomTitle">Edit Patient</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="patient-form">
            @csrf
            <input type="hidden" name="id" id="patientId">

            <div class="form-group mb-3">
                <label for="">Patient Name</label>
                <input type="text" name="name" id="adminpatientName" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Patient Email</label>
                <input type="text" name="email" id="adminpatientEmail" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Patient Phone</label>
                <input type="text" name="phone" id="adminpatientPhone" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Patient Cnic</label>
                <input type="text" name="cnic" id="adminpatientCnic" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Patient Gender</label>
                <input type="text" name="gender" id="adminpatientGender" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="patientSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>
    </div>
    </div>
  </div>
