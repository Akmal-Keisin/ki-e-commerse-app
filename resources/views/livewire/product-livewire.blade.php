
<div class="px-5 mb-5">
    @include('livewire.product_modal.add_product_modal')
    @include('livewire.product_modal.detail_product_modal')

    @if($msg = session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; left: 50%; top: 1rem; transform: translateX(-50%);">
          {{ $msg }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif($msg = session('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: absolute; left: 50%; top: 1rem; transform: translateX(-50%);">
          {{ $msg }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif($msg = session()->get('deleteVariantSuccess'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif($msg = session()->get('activateSuccess'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif($msg = session()->get('productDeleted'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Product List</h1>
        <div class="action-button d-flex">
            <!-- Button trigger modal -->
            <div class="input-group me-2" >
                <input type="text" wire:model="search" class="form-control" name="search">
                <button type="text" class="btn btn-primary">Search</button>
            </div>
            <button wire:click="resetInput" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
              Add
            </button>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 mb-3">
                    <div class="card p-2 card-product text-decoration-none text-dark">
                        <div class="card-head">
                            <img class="w-100" src="{{ asset('storage/' . $product->image)  }}">
                        </div>  
                        <div class="card-body p-0 mt-2">
                            <h3 class="fw-bold m-0">{{ $product->name }}</h3>
                            <div class="d-flex align-items-center p-0 mb-2" style="list-style: none;">
                                <i class='bx bxs-star star-filled'></i>
                                <span>{{ $product->rating }}</span>
                            </div> 
                            <p class="">{{ Str::limit($product->description, 80, '...') }}.</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            @if($product->active == 'active')
                                <p class="p-0 m-0 text-success">Active</p>
                            @else
                                <p class="p-0 m-0 text-danger">Non Active</p>
                            @endif
                            <button wire:click="getProduct({{ $product->id }})" class="btn btn-primary" data-bs-target="#detailProduct" data-bs-toggle="modal">More Detail</button>
                        </div>
                    </div>
                </div>
            @empty
                <h2 class="text-center">Product Empty</h2>
            @endforelse
            {{ $products->links() }}
        </div>
    </div>
</div>

@push('javascript')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    window.livewire.on('dataCreated', () => {
        $('#addProductModal').modal('hide')
        $('#addProduct')[0].reset()
    })
    window.livewire.on('variantCreated', () => {
        $('#addProductVariant').modal('hide')
        $('#detailProduct').modal('show')
    })
    window.livewire.on('variantUpdated', () => {
        $('#editVariantModal').modal('hide')
        $('#detailProduct').modal('show')
        $('#updateVariant')[0].reset()
    })
    window.livewire.on('productUpdated', () => {
        $('#editProductModal').modal('hide')
        $('#detailProduct').modal('show')
    })
    window.livewire.on('restockSuccess', () => {
        $('#restockVariantModal').modal('hide')
        $('#detailProduct').modal('show')
    })
    window.livewire.on('productActivated', () => {
        $('#detailProduct').modal('hide')
    })
    window.livewire.on('productDeleted', () => {
        $('#alertModal').modal('hide')
    })
    window.livewire.on('addImageSliderSuccess', () => {
        $('#addImageSlider').modal('hide')
        $('#imageSlider').modal('show')
    })
    window.livewire.on('editImageSliderSuccess', () => {
        $('#editImageSliderForm')[0].reset()
        $('#editImageSlider').modal('hide')
        $('#imageSlider').modal('show')
    })
    window.livewire.on('deleteImageSliderSuccess', () => {
        $('#alertImageSliderModal').modal('hide')
        $('#imageSlider').modal('show')
    })
    window.livewire.on('deleteVariantSuccess', () => {
        $('#alertImageSliderModal').modal('hide')
    })
</script>
@endpush