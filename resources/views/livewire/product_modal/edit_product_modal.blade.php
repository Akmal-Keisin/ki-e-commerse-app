<!-- Edit Product Modal -->
<div wire:ignore.self class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="editProduct" id="editProductForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name :</label>
                <input wire:model="productName" type="text" id="name" name="name" class="form-control">
                @error('productName') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea wire:model="productDescription" rows="8" type="text" id="description" name="name" class="form-control">
                </textarea>
                @error('productDescription') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category :</label>
                <select wire:model="productCategoryId" id="category" name="name" class="form-control">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                        <option @if($productCategoryId == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('productCategoryId') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input wire:model="productImage" type="file" id="image" name="image" class="form-control">
                @error('productImage') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
             <div class="mb-3">
                <label for="rating" class="form-label">Rating :</label>
                <input wire:model="productRating" type="number" step="0.1" name="productRating" id="rating" min="1" max="5" class="form-control">
                @error('productRating') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button type="submit" form="editProductForm" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>