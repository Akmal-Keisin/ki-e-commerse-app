@extends('layout.core')
@push('css')
<!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
@endpush
@section('title', 'Category')
@section('content')
<div class="px-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Category List</h1>
        <div class="action-button d-flex">
            <div class="input-group me-2">
                <input type="text" class="form-control" name="search">
                <button class="btn btn-primary">Search</button>
            </div>
            <!-- Button trigger category modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
              Add
            </button>

            <!-- Add Category Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" id="addCategory" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name :</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category_img" class="form-label">Image/Logo</label>
                            <input type="file" name="image" class="form-control" id="category_img">
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addCategory" class="btn btn-primary">Add Now</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <div class="col-lg-2 mb-3 d-flex justify-content-center align-items-center">
                <a href="#" class="card-category card p-4 text-decoration-none text-dark d-flex justify-content-center align-items-center" >
                    <img class="img-fluid" src="{{ asset('img/category/adidas.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-2 mb-3 d-flex justify-content-center align-items-center">
                <a href="#" class="card-category card p-4 text-decoration-none text-dark d-flex justify-content-center align-items-center" >
                    <img class="img-fluid" src="{{ asset('img/category/nike.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-2 mb-3 d-flex justify-content-center align-items-center">
                <a href="#" class="card-category card p-4 text-decoration-none text-dark d-flex justify-content-center align-items-center" >
                    <img class="img-fluid" src="{{ asset('img/category/jordan.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
@endpush
