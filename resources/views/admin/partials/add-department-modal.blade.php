<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="departmentTitle">Add Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="department-form">
            @csrf
            <input type="hidden" name="id" id="departmentId">
            <div>
                <label for="DepartmentLable">Department Name</label>
                <input type="text" class="form-control" name="name" id="departmentName" placeholder="Enter Department Name">
            </div>
            <span id="error_name" class="text-danger"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="departmentSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>

      </div>
    </div>
  </div>



    {{-- Rooms Modal --}}



    <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roomTitle">Add Room</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="room-form">
            @csrf
            <input type="hidden" name="id" id="roomId">
            <div class="mb-3">
                <label for="roomLable">Room Name</label>
                <input type="text" class="form-control" name="name" id="roomName" placeholder="Enter Room Name">
            </div>
            <span class="error_name text-danger"></span>
            <div class="">
                <label for="departLable">Departments</label>
                 <select class="form-control" name="department_id" id="selectDepartmentId">
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="roomSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>

      </div>
    </div>
  </div>


                {{-- Add Doctors --}}
    <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="doctorTitle">Add Doctor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="doctor-form">
            @csrf
            <input type="hidden" name="id" id="doctorId">
            <div class="mb-3">
                <label for="roomLable">Doctor Name</label>
                <input type="text" class="form-control" name="name" id="doctorName" placeholder="Enter Doctor Name">
            </div>
            <span class="error_name text-danger"></span>
            <div class="mb-3">
                <label for="roomLable">Email</label>
                <input type="email" class="form-control" name="email" id="doctorEmail" placeholder="Enter Your Email">
            </div>
            <span class="error_email text-danger"></span>
            <div class="mb-3">
                <label for="roomLable">Password</label>
                <input type="password" class="form-control" name="password" id="doctorPassword" placeholder="Enter Your Password">
            </div>
            <span class="error_password text-danger"></span>
            <div class="mb-3">
                <label for="departLable">Departments</label>
                 <select class="form-control" id="doctorDepartmentId">
                    <option value="">Chose Department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="mb-3">
                <label for="roomLable">Rooms</label>
                 <select class="form-control" name="room_id" id="doctorRoomId">

                 </select>
            </div>
            <span class="error_room_id text-danger"></span>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border-sm" id="doctorSpinner" role="status" aria-hidden="true"></span>
                    Save change
                  </button>
              </div>
        </form>
        </div>

      </div>
    </div>
  </div>



