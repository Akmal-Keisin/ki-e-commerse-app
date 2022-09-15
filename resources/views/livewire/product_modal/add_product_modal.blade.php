<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModallabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModallabel">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" wire:submit.prevent="store" id="addProduct" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name :</label>
                <input wire:model="productName" type="text" name="productName" id="name" class="form-control">
                @error('productName') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category :</label>
                <select wire:model="productCategoryId" name="productCategoryId" id="category" class="form-select">
                    <option>Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('productCategoryId') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea wire:model="productDescription" name="productDescription" id="description" cols="30" rows="5" class="form-control"></textarea>
                @error('productDescription') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input wire:model="productImage" type="file" name="productImage" id="image" class="form-control">
                @error('productImage') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="addProduct" class="btn btn-primary">Add Product</button>
      </div>
    </div>
  </div>
</div>