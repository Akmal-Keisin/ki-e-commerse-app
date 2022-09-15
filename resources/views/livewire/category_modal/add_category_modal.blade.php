<!-- Add Category Modal -->
<div wire:ignore.self wire:hidden.bs.modal="resetInput" class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" wire:submit.prevent="store" id="addCategory" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name :</label>
                <input type="text" name="name" class="form-control" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image/Logo</label>
                <input type="file" name="image" class="form-control" wire:model="image">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="addCategory" class="btn btn-primary">Add Now</button>
      </div>
    </div>
  </div>
</div>