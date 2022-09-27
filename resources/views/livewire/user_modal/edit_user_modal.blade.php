<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" wire:submit.prevent="updateUser" id="editUserForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input wire:model="userName" type="text" class="form-control" name="name">
            @error('userName') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input wire:model="userPhone" type="number" class="form-control" name="phone_number">
            @error('userPhone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input wire:model="userPassword" type="password" class="form-control" name="password">
            @error('userPassword') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input wire:model="userImage" type="file" class="form-control" name="image">
            @error('userImage') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="editUserForm" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>