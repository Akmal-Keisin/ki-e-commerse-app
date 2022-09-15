@extends('layout.core')
@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
@section('title', 'Sales Report')
@section('content')
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
                <p>Rp. 300.000.000,00</p>
            </div>
            <div class="m-1 p-3 info-card bg-red">
                <h2 class="fw-bold">Total Pengeluaran :</h2>
                <p>Rp. 300.000.000,00</p>
            </div>
            <div class="m-1 p-3 info-card bg-blue">
                <h2 class="fw-bold">Target Bulanan Penghasilan :</h2>
                <p>Rp. 300.000.000,00</p>
            </div>  
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Checkout Bulan Ini</h1>
            </div>
            <div class="card p-3 overflow-auto" style="height: 30rem;">
                <table class="table table-striped align-middle">
                    <thead>
                      <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">Tangal</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <h1>Top Valueable User</h1>
            <div class="card p-3 overflow-auto" style="height: 30rem;">
                <table class="table table-striped align-middle">
                    <thead>
                      <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Checkout</th>
                        <th scope="col">Checkout Count</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">Derry</td>
                            <td scope="col">derry@gmail.com</td>
                            <td scope="col">Rp. 130.000.000,00</td>
                            <td scope="col">200</td>
                        </tr>
                        <tr>
                            <td scope="col">2</td>
                            <td scope="col">Derry</td>
                            <td scope="col">derry@gmail.com</td>
                            <td scope="col">Rp. 130.000.000,00</td>
                            <td scope="col">200</td>
                        </tr>
                        <tr>
                            <td scope="col">3</td>
                            <td scope="col">Derry</td>
                            <td scope="col">derry@gmail.com</td>
                            <td scope="col">Rp. 130.000.000,00</td>
                            <td scope="col">200</td>
                        </tr>
                        <tr>
                            <td scope="col">4</td>
                            <td scope="col">Derry</td>
                            <td scope="col">derry@gmail.com</td>
                            <td scope="col">Rp. 130.000.000,00</td>
                            <td scope="col">200</td>
                        </tr>
                        <tr>
                            <td scope="col">5</td>
                            <td scope="col">Derry</td>
                            <td scope="col">derry@gmail.com</td>
                            <td scope="col">Rp. 130.000.000,00</td>
                            <td scope="col">200</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-6">
            <h1>Top Sold Product</h1>
            <div class="card p-3 overflow-auto" style="height: 30rem;">
                <table class="table table-striped align-middle">
                    <thead>
                      <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">Tangal</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <h1>Top Sold Category</h1>
            <div class="card p-3 overflow-auto" style="height: 30rem;">
                <table class="table table-striped align-middle">
                    <thead>
                      <tr class="bg-blue">
                        <th scope="col">#</th>
                        <th scope="col">Tangal</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">12-09-2022</td>
                            <td scope="col">Snail</td>
                            <td scope="col">snail@gmail.com</td>
                            <td scope="col">Legion 5 Pro</td>
                            <td scope="col">1</td>
                            <td scope="col">Rp. 23.000.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    const { createApp } = Vue
    const app = createApp({
        data() {
            return {
                xValues : [50,60,70,80,90,100,110,120,130,140,150],
                yValues : [7,8,8,9,9,9,10,11,14,14,15]
            }
        },
        methods: {
        },
        mounted() {
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: this.xValues,
                    pointRadius: 1,
                    datasets: [{
                    backgroundColor: "rgba(236, 248, 255, .7)",
                    borderColor: "#2E5D7F",
                    data: this.yValues
                    }]
                },
                // options:{...}
            })
        }
    })
    app.mount('#app')
</script>
@endpush
