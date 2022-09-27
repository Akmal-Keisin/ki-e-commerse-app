@push('css')
@endpush
<div class="px-5 mb-5">
    @include('livewire.admin_modal.add_admin_modal')
    @include('livewire.admin_modal.edit_admin_modal')
    @include('livewire.admin_modal.detail_admin_modal')
    @include('livewire.admin_modal.alert_admin_modal')
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
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Admin List</h1>
            <div class="action-button d-flex">
                <div class="input-group me-2" >
                    <input type="text" wire:model="search" class="form-control" name="search">
                    <button type="text" class="btn btn-primary">Search</button>
                </div>
                <button wire:click="resetInput" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                  Add
                </button>
            </div>
        </div>
        <div class="card p-3 overflow-auto" style="height: 30rem;">
            <table class="table table-striped align-middle">
                <thead>
                    <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td scope="col">{{ $loop->iteration }}</td>
                            <td scope="col">{{ $admin->name }}</td>
                            <td scope="col">{{ $admin->phone_number }}</td>
                            <td scope="col" class="">
                                <div class="d-flex">
                                    <button wire:click="setAdminProperty({{ $admin->id }})" class="me-1 btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAdminModal">Edit</button>
                                    <button wire:click="setAdminProperty({{ $admin->id }})" class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#alertAdminModal">Delete</button>
                                    <button wire:click="setAdminProperty({{ $admin->id }})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailAdminModal">Detail</button>
                                </div>
                            </td>
                        </tr>
                    @empty  
                        <tr>
                            <td colspan="4"><h3 class="text-center">Admin Empty</h3></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('javascript')
<script>
    window.livewire.on('adminCreated', () => {
        $('#addadminModal').modal('hide')
        $('#addadminForm')[0].reset()
    })
    window.livewire.on('adminUpdated', () => {
        $('#editAdminModal').modal('hide')
        $('#editAdminForm')[0].reset()
    })
    window.livewire.on('userDeleted', () => {
        $('#alertAdminModal').modal('hide')
    })
</script>
@endpush