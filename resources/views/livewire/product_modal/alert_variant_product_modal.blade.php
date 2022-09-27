<!-- Alert Modal -->
<div wire:ignore.self class="modal fade" id="alertVariantModal" tabindex="-1" aria-labelledby="alertVariantModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Variant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Apakah anda yakin menghapus variant ini?</h3>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button wire:click="deleteVariant()" role="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>