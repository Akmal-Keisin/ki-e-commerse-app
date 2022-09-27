<!-- Detail Modal -->
<div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
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
                <td>{{ $variantName }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img style="max-width: 10rem" src="{{ asset('storage/'. $variantImage) }}" alt="">
                </td>
            </tr>
            <tr>
                <th>Size</th>
                <td>
                    <ul style="list-style:none;max-height:10rem;" class="m-0 p-0 overflow-auto">
                        @foreach($variantSizeList as $size => $value)
                            <li class="d-flex align-items-center mb-1">
                                <span class="bg-core text-light px-3 py-2">{{ $value['size'] }}</span>
                                <span class="ms-2">{{ $value['stock'] }}</span>
                                <span class="ms-2">({{ $value['price'] }})</span>
                            </li>
                        @endforeach
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