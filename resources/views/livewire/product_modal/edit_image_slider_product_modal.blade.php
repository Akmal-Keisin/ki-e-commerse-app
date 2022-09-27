<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editImageSlider" tabindex="-1" aria-labelledby="editImageSliderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Image Slider</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="editImageSlider" action="" enctype="multipart/form-data" id="editImageSliderForm">
          <label for="imageSlider" class="form-label">Image :</label>
          <input type="file" class="form-control" wire:model="imageSlider">
          @error('imageSlider') <span class="text-danger">{{ $message }}</span> @enderror
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button type="submit" form="editImageSliderForm" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>