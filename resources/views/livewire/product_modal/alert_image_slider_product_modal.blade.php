<!-- Alert Modal -->
<div wire:ignore.self class="modal fade" id="alertImageSliderModal" tabindex="-1" aria-labelledby="alertImageSliderModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Image Slider</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Apakah anda yakin menghapus gambar ini?</h3>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#imageSlider" role="button">Back</a>
        <button wire:click="removeImageSlider()" role="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>