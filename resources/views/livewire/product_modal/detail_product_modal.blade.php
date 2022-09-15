@if($product)
<div wire:ignore.self class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="detailProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailProductModalLabel">Detail Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>Product Info</h1>
        <div class="card p-3">
            <div class="row">
                <div class="col-3">
                    <img class="img-fluid" src="{{ asset('img/shoes/jordan2.png') }}" alt="">
                </div>
                <div class="col-4">
                    <h2>Information</h2>
                    <table class="table table-borderless">
                        <tr>
                            <th class="key pe-5">Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th class="key pe-5">Description</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th class="key pe-5">Category</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Sold</th>
                            <td>4000 pcs</td>
                        </tr>
                        <tr>
                            <th>Total Income</th>
                            <td>Rp. 400.000.000,00</td>
                        </tr>
                    </table>
                    <div class="d-flex">
                        <button class="btn me-2 btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal">
                            Edit
                        </button>
                        <button class="btn me-2 btn-danger">
                            Delete
                        </button>
                        
                    </div>
                </div>
                <div class="col-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Variant</h2>
                        <button class="btn btn-primary btn-sm" data-bs-target="#addProductVariant" data-bs-toggle="modal">Add Variant</button>
                    </div>
                    <div class="overflow-auto" style="max-height: 20rem;">
                        <table class="table table-fixed">
                            <thead>
                                <th>#</th>
                                <th>Variant Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Blue Navy</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal">
                                            Detail
                                        </button>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#restockVariantModal">
                                            Restock
                                        </button>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVariantModal">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@include('livewire.product_modal.edit_product_modal')
@include('livewire.product_modal.add_product_variant_modal')
@include('livewire.product_modal.detail_product_variant_modal')
@include('livewire.product_modal.edit_product_variant_modal')
@include('livewire.product_modal.add_product_variant_modal')
@include('livewire.product_modal.restock_product_variant_modal')
@endif