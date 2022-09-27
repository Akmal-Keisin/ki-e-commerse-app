<!-- Modal -->
<div wire:ignore.self class="modal fade" id="detailAdminModal" tabindex="-1" aria-labelledby="detailAdminModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <img src="{{ asset('storage/image') . '/' . $adminImage }}" alt="test" style="max-width: 10rem;">
        </div>
        <table>
          <tbody>
            <tr>
              <th>Name</th>
              <td>: {{ $adminName }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>: {{ $adminPhone }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>