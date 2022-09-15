<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Variant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
            <tr>
                <th>Name</th>
                <td>Variant 1</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img style="max-width: 10rem" src="{{ asset('img/shoes/jordan2.png') }}" alt="">
                </td>
            </tr>
            <tr>
                <th>Size</th>
                <td>
                    <ul style="list-style:none;max-height:10rem;" class="m-0 p-0 overflow-auto">
                        <li class="d-flex align-items-center mb-1">
                            <span class="bg-core text-light px-3 py-2">39</span>
                            <span class="ms-2">20pcs</span>
                        </li>
                        <li class="d-flex align-items-center mb-1">
                            <span class="bg-core text-light px-3 py-2">40</span>
                            <span class="ms-2">10pcs</span>
                            <span class="text-danger ms-1">(Perlu Stock)</span>
                        </li>
                        <li class="d-flex align-items-center mb-1">
                            <span class="bg-core text-light px-3 py-2">42</span>
                            <span class="ms-2">5pcs</span>
                            <span class="text-danger ms-1">(Perlu Stock)</span>
                        </li>
                        <li class="d-flex align-items-center mb-1">
                            <span class="bg-core text-light px-3 py-2">43</span>
                            <span class="ms-2">20pcs</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
      </div>
    </div>
  </div>
</div>