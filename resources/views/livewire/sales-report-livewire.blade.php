@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
    <div class="px-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card p-3 h-100">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-4">
                <div class="m-1 p-3 info-card bg-green">
                    <h2 class="fw-bold">Total Penghasilan :</h2>
                    <p>{{ $totalPenghasilan }}</p>
                </div>
                <div class="m-1 p-3 info-card bg-red">
                    <h2 class="fw-bold">Total Pengeluaran :</h2>
                    <p>{{ $totalPengeluaran }}</p>
                </div>
            </div>
        </div>
        <h1 class="mt-3">List Checkout</h1>
        <div class="card p-3 overflow-auto" style="height: 30rem;">
            <table class="table table-striped align-middle">
                <thead>
                  <tr class="bg-blue">
                    <th scope="col">#</th>
                    <th scope="col">Tangal</th>
                    <th scope="col">User</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($checkout as $item)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $item->created_at }}</td>
                        <td scope="col">{{ $item->user->name }}</td>
                        <td scope="col">{{ $item->user->phone_number }}</td>
                        <td scope="col">{{ $item->final_cost_total }}</td>
                        <td scope="col"><button class="btn-primary btn btn-sm">Detail</button></td>
                    </tr>
                    @empty

                    @endempty
                </tbody>
            </table>
        </div>
        <h1 class="mt-3">Liset Pengeluaran</h1>
        <div class="card p-3 overflow-auto" style="height: 30rem;">
            <table class="table table-striped align-middle">
                <thead>
                  <tr class="bg-blue">
                    <th scope="col">#</th>
                    <th scope="col">Admin</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col">Total Pengeluaran</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($expense as $item)
                    <tr>
                        <td scope="col">{{ $item->iteration }}</td>
                        <td scope="col">{{ $item->admin_id }}</td>
                        <td scope="col">derry@gmail.com</td>
                        <td scope="col">{{ $item->final_cost_total }}</td>
                        <td scope="col">{{ $item->type }}</td>
                        <td scope="col"><button class="btn-primary btn btn-sm">Detail</button></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    const xValues = [50,60,70,80,90,100,110,120,130,140,150]
    const yValues = [7,8,8,9,9,9,10,11,14,14,15]
    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            pointRadius: 1,
            datasets: [{
            backgroundColor: "rgba(236, 248, 255, .7)",
            borderColor: "#2E5D7F",
            data: yValues
            }]
        },
        // options:{...}
    })
</script>
