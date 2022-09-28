<div>
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endpush
<div class="px-5 mb-5">
    @section('title', 'Dashboard')
    <div class="row justify-content-evenly align-items-center my-5">
        <div class="col m-1 p-3 info-card bg-green">
            <h2 class="fw-bold">Penghasilan</h2>
            <p>Rp. 300.000.000,00</p>
        </div>
        <div class="col m-1 p-3 info-card bg-red">
            <h2 class="fw-bold">Pengeluaran :</h2>
            <p>Rp. 300.000.000,00</p>
        </div>
        <div class="col m-1 p-3 info-card bg-blue">
            <h2 class="fw-bold">User Baru :</h2>
            <p>1999</p>
        </div>
        <div class="col m-1 p-3 info-card bg-warning">
            <h2 class="fw-bold">Target Bulanan :</h2>
            <p>Rp. 300.000.000,00</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <h1>Info Hari Ini</h1>
            <div class="card p-3 card-info row align-items-center overflow-auto">
                <table class="table table-striped align-middle">
                    <thead>
                      <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">Tangal</th>
                        <th scope="col">User</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>20-03-2022</td>
                        <td>Otto</td>
                        <td>Rp. 2.000.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>23-06-2022</td>
                        <td>Tony</td>
                        <td>Rp. 2.500.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>14-06-2021</td>
                        <td>Derry</td>
                        <td>Rp. 1.200.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>14-06-2021</td>
                        <td>Derry</td>
                        <td>Rp. 1.200.000,00</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>14-06-2021</td>
                        <td>Derry</td>
                        <td>Rp. 1.200.000,00</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="col-6">
            <h1>Grafik Bulanan</h1>
            <div class="card card-info p-3">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-3 product-perlu-stock">
        <div class="col">
            <h1>Product Perlu Stock Ulang</h1>
            <div class="card p-3">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <a href="#" class="card p-2 card-product text-decoration-none text-dark">
                            <div class="card-head">
                                <img class="w-100" src="{{ asset('img/shoes/jordan2.png') }}">
                            </div>  
                            <div class="card-body p-0 mt-2">
                                <h3 class="fw-bold m-0">Jordan Air 1</h3>
                                <ul class="d-flex p-0 mb-2" style="list-style: none;">
                                    <li>
                                        <i class='bx bxs-star star-filled'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star star-filled'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star star-filled'></i>
                                    </li>
                                    <li>
                                        <i class='bx bxs-star star-filled'></i>
                                    </li>
                                    <li>
                                        <i class='bx bx-star star'></i>
                                    </li>
                                </ul>
                                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit...</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0 text-danger">20 Stock</p>
                                <p class="p-0 m-0">Rp. 4.000.000,00</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
@endpush

</div>
