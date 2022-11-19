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



