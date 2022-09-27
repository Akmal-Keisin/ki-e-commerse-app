<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addImageSlider" tabindex="-1" aria-labelledby="addImageSliderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Image Slider</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addImageSlider" action="" enctype="multipart/form-data" id="addImageSliderForm">
          <label for="imageSlider" class="form-label">Image :</label>
          <input type="file" class="form-control" wire:model="imageSlider">
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#imageSlider" role="button">Back</a>
        <button type="submit" form="addImageSliderForm" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>