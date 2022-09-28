
<div class="px-5 mb-5">
    @section('title', 'Category')
    @include('livewire.category_modal.add_category_modal')
    @include('livewire.category_modal.edit_category_modal')
    @include('livewire.category_modal.delete_category_modal')
    @include('livewire.category_modal.product_list_category_modal')
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
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Category List</h1>
        <div class="action-button d-flex">
            <div class="input-group me-2">
                <input wire:model="search" type="text" class="form-control" name="search">
                <button class="btn btn-primary">Search</button>
            </div>
            <!-- Button trigger category modal -->
            <button type="button" class="btn btn-primary" wire:click="resetInput" data-bs-toggle="modal" data-bs-target="#addModal">
              Add
            </button>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            @forelse($categories as $category)
                <div class="col-lg-2 mb-3 d-flex justify-content-center align-items-center flex-column">
                    <div data-bs-toggle="modal" data-bs-target="#productList" wire:click="getProductList({{ $category->id }})" class="card-category card p-4 text-decoration-none text-dark d-flex justify-content-center align-items-center" >
                        <img class="img-fluid" src="{{ asset('storage/' . $category->image) }}" alt="">
                    </div>
                    <div class="action-button mt-2">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="edit({{ $category->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click.prevent="confirmDelete({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </div>
                    <p class="mt-2">{{ $category->name }}</p>
                </div>
            @empty
                <h2 class="text-center">Category Empty</h2>
            @endforelse
        </div>
        {{ $categories->links() }}
    </div>
</div>


@push('javascript')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    window.livewire.on('dataCreated', () => {
        $('#addModal').modal('hide')
        $('#addCategory')[0].reset()
    })
    window.livewire.on('dataUpdated', () => {
        $('#editModal').modal('hide')
        $('#editCategory')[0].reset()
    })
    window.livewire.on('dataDeleted', () => {
        $('#deleteModal').modal('hide')
    })
    window.livewire.on('closeDataProduct', () => {
        $('#productList').modal('hide')
    })
</script>
@endpush
