<!-- Edit Variant Modal -->
<div wire:ignore.self class="modal fade" id="editVariantModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Variant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="" enctype="multipart/form-data" method="post" id="updateVariant" wire:submit.prevent="updateVariant()">
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
                    <button type="button" wire:click="addEditSize()" class="btn btn-primary btn-sm">Add Sizes</button>
                  </div>
                  @error('variantSizeList')
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
                     @forelse($variantSizeList as $size => $value)
                        <tr>
                          <td>
                            <input type="number" class="form-control" wire:model="variantSizeList.{{ $size }}.stock">
                            @error("variantSizeList.".$size.".stock") <span class="text-danger">{{ $message }}</span> @enderror
                          </td>
                          <td>
                            <input type="number" class="form-control" wire:model="variantSizeList.{{ $size }}.price">
                            @error("variantSizeList.".$size.".price") <span class="text-danger">{{ $message }}</span> @enderror
                          </td>
                          <td>
                            <input type="number" class="form-control" wire:model="variantSizeList.{{ $size }}.size">
                            @error("variantSizeList.".$size.".size") <span class="text-danger">{{ $message }}</span> @enderror
                          </td>
                          <td><button type="button" wire:click.prevent="deleteEditSize({{ $size }})" class="btn btn-danger btn-sm">Delete</button></td>
                        </tr>
                      @empty
                        <tr>
                            <td colspan="3"><h3>Empty</h3></td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button type="submit" form="updateVariant" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>