@extends('layout.core')
@push('css')
@endpush
@section('title', 'User')
@section('content')
<div class="px-5 mb-5">
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

                    <!-- Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card p-3 overflow-auto" style="height: 30rem;">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr class="bg-blue">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">Derry Ferry</td>
                            <td scope="col">derryferry@gmail.com</td>
                            <td scope="col" class="">
                                <div class="d-flex">
                                    <button class="me-1 btn btn-warning btn-sm">Edit</button>
                                    <button class="me-1 btn btn-danger btn-sm">Delete</button>
                                    <button class="btn btn-primary btn-sm">Detail</button>
                                </div>
                            </td>
                        </tr>
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
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">1</td>
                            <td scope="col">Derry Ferry</td>
                            <td scope="col">derryferry@gmail.com</td>
                            <td scope="col" class="">
                                <div class="d-flex">
                                    <button class="me-1 btn btn-warning btn-sm">Edit</button>
                                    <button class="me-1 btn btn-danger btn-sm">Delete</button>
                                    <button class="btn btn-primary btn-sm">Detail</button>
                                </div>
                            </td>
                        </tr>
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
                        <td>400</td>
                    </tr>
                    <tr>
                        <th>Total User Baru Hari Ini</th>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Total User Baru Bulan Ini</th>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Total User Baru Tahun Ini</th>
                        <td>10</td>
                    </tr>
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
           
        }
    })
    app.mount('#app')
</script>
@endpush
