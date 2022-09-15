@extends('layout.core')
@push('css')
<!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
@endpush
@section('title', 'Product')
@section('content')
<div class="px-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Product List</h1>
        <div class="action-button">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name :</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category :</label>
                            <select name="category_id" id="category" class="form-select">
                                <option value="1">Adidas</option>
                                <option value="1">Nike</option>
                                <option value="1">Jordan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Product</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card p-2 card-product text-decoration-none text-dark">
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
                        <button class="btn btn-primary">Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
@endpush
