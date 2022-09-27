<!-- Modal -->
<div wire:ignore.self class="modal fade" id="alertAdminModal" tabindex="-1" aria-labelledby="alertAdminModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2 class="text-center">Apakah Anda Yakin Akan Menghapus Admin <strong class="text-danger">{{ $adminName }}</strong>?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" wire:click="deleteAdmin"class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>