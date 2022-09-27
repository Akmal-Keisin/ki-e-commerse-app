@push('css')
@endpush
    <div class="px-5 mb-5">
        @include('livewire.user_modal.add_user_modal')
        @include('livewire.user_modal.edit_user_modal')
        @include('livewire.user_modal.detail_user_modal')
        @include('livewire.user_modal.alert_user_modal')
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
            <div class="col-6">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>User List</h1>
                    <div class="d-flex">
                        <div class="input-group me-1">
                            <input type="text" class="form-control">
                            <button class="btn btn-outline-primary">Search</button>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
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
                            @forelse($users as $user)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $user->name }}</td>
                                    <td scope="col">{{ $user->phone_number }}</td>
                                    <td scope="col" class="">
                                        <div class="d-flex">
                                            <button wire:click="setUserProperty({{ $user->id }})" class="me-1 btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button>
                                            <button wire:click="setUserProperty({{ $user->id }})" class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#alertUserModal">Delete</button>
                                            <button wire:click="setUserProperty({{ $user->id }})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailUserModal">Detail</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><h3 class="text-center">Users Empty</h3></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <h1>User Baru Hari Ini</h1>
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
                            @forelse($newUsers as $newUser)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $newUser->name }}</td>
                                    <td scope="col">{{ $newUser->phone_number }}</td>
                                    <td scope="col" class="">
                                        <div class="d-flex">
                                            <button wire:click="setUserProperty({{ $user->id }})" class="me-1 btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button>
                                            <button wire:click="setUserProperty({{ $user->id }})" class="me-1 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#alertUserModal">Delete</button>
                                            <button wire:click="setUserProperty({{ $user->id }})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailUserModal">Detail</button>
                                        </div>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><h3 class="text-center">Users Empty</h3></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-7">
                <h1>Grafik Bulanan</h1>
                <div class="card p-3">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-5">
                <h1>Total User</h1>
                <div class="card p-3">
                    <table class="table-borderless">
                        <tr>
                            <th>Total User</th>
                            <td>{{ $totalUsers }}</td>
                        </tr>
                        <tr>
                            <th>Total User Baru Hari Ini</th>
                            <td>{{ $totalUsersThisDay }}</td>
                        </tr>
                        <tr>
                            <th>Total User Baru Bulan Ini</th>
                            <td>{{ $totalUsersThisMonth }}</td>
                        </tr>
                        <tr>
                            <th>Total User Baru Tahun Ini</th>
                            <td>{{ $totalUsersThisYear }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>


    let reportData = JSON.parse(`<?= $userReport ?>`)

    window.livewire.on('userCreated', () => {
        console.log(reportData)
        $('#addUserModal').modal('hide')
        $('#addUserForm')[0].reset()
    })
    window.livewire.on('userUpdated', () => {
        $('#editUserModal').modal('hide')
        $('#editUserForm')[0].reset()
    })
    window.livewire.on('userDeleted', () => {
        $('#alertUserModal').modal('hide')
    })

    console.log(reportData)

    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = []
    const valueData = [] 

    reportData.forEach(function(item, index) {
        labels.push(item.month)
        valueData.push(item.count)
    })

    const data = {
    labels: labels,
    datasets: [
            {
              label: 'Total new user',
              backgroundColor: '#ECF8FF',
              borderColor: '#2E5D7F',
              data: valueData,
            }
        ]
    };

    const config = {
    type: 'line',
    data: data,
    options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
@endpush
