<!-- Add Variant Modal -->
<div wire:ignore.self class="modal fade" id="addProductVariant" tabindex="-1" aria-labelledby="addProductVariantLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductVariantLabel">Add Variant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" method="post" id="addvariant" wire:submit.prevent="addVariant">
          @csrf
          <div class="row">
            <div class="col-4">
              <h2>Variant</h2>
              <div class="mb-3">
                <label for="" class="form-label">Variant Name</label>
                <input type="text" class="form-control" wire:model="variantName" name="variantName">
                @error('variantName') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" wire:model="variantImage" name="variantImage">
                @error('variantImage') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="col-8">
              <div class="d-flex justify-content-between align-items-center">
                <h2>Sizes</h2>
                <button type="button" wire:click="addSizes({{ $i }})" class="btn btn-primary btn-sm">Add Sizes</button>
              </div>
              @error('sizes')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>Stock</th>
                    <th>Price(Rp)</th>
                    <th>Sizes</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($inputs as $key => $value)
                    <tr>
                      <td>
                        <input type="number" wire:model="sizes.{{ $value }}.stock" class="form-control">
                        @error('sizes.' . $value . '.stock') <span class="text-danger">{{ $message }}</span> @enderror
                      </td>
                      <td>
                        <input type="number" wire:model="sizes.{{ $value }}.price" class="form-control">
                        @error('sizes.' . $value . '.price') <span class="text-danger">{{ $message }}</span> @enderror
                      </td>
                      <td>
                        <input type="number" wire:model="sizes.{{ $value }}.size" class="form-control">
                        @error('sizes.' . $value . '.size') <span class="text-danger">{{ $message }}</span> @enderror
                      </td>
                      <td><button type="button" wire:click.prevent="removeSizes({{ $key }})" class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
         <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button type="submit" form="addvariant" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>