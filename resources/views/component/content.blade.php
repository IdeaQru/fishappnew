<!-- Button trigger modal -->



@auth
<button type="button" class="btn btn-gray-800 d-inline-flex align-items-center" id="openModalButton"
    data-bs-toggle="modal" data-bs-target="#newTaskModal">
    New Task
</button>
<!-- Modal -->
<div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTaskModalLabel">Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newTaskForm" action="{{route('tasks.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="potensial">Potensial</option>
                            <option value="kurangpotensial">Kurang Potensial</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('newTaskForm');
        form.addEventListener('submit', function (event) {
            // Check if all fields are filled
            var isValid = true;
            form.querySelectorAll('input, select').forEach(function (input) {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('is-invalid'); // Add Bootstrap is-invalid class to highlight the error
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if not valid
            }
        });
    });
</script>
@endauth
