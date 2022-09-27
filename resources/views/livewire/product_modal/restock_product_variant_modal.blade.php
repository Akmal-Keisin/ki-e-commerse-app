<!-- Restock Modal -->
<div wire:ignore.self class="modal fade" id="restockVariantModal" tabindex="-1" aria-labelledby="restockVariantModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Restock Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="m-0 p-0" style="list-style:none;">
            @foreach($variantSizeList as $size => $value)
                <li class="me-1 mb-1 d-flex">
                    <div  class="py-2 px-3 bg-core text-light">{{ $value['size'] }}</div>
                    <div class="d-flex align-items-center ps-1">
                        <input wire:model="variantSizeList.{{ $size }}.stock" type="number" name="stock" class="form-control">
                    </div>
                </li>
            @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button wire:click="restockProductVariant()" type="button" class="btn btn-success">Restock</button>
      </div>
    </div>
  </div>
</div>