<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" wire:submit.prevent="updateAdmin" id="editAdminForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input wire:model="adminName" type="text" class="form-control" name="name">
            @error('adminName') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input wire:model="adminPhone" type="number" class="form-control" name="phone_number">
            @error('adminPhone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input wire:model="adminPassword" type="password" class="form-control" name="password">
            @error('adminPassword') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input wire:model="adminImage" type="file" class="form-control" name="image">
            @error('adminImage') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="editAdminForm" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>