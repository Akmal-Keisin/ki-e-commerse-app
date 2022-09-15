@extends('layout.core')
@push('css')
<!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
@endpush
@section('title', 'Jordan')
@section('content')
<div class="px-5 mb-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Jordan List</h1>
        <div class="action-button">
            <button class="btn btn-primary btn-sm">
                <i class='bx bx-plus-circle'></i>
            </button>
        </div>
    </div>
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
@endsection
@push('javascript')
@endpush
