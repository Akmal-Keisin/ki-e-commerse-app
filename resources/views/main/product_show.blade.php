@extends('layout.core')
@push('css')
<!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
@endpush
@section('title', 'Product')
@section('content')
<div class="px-5 mb-5">
    <h1>Product Info</h1>
    <div class="card p-3">
        <div class="row">
            <div class="col-3">
                <img class="img-fluid" src="{{ asset('img/shoes/jordan2.png') }}" alt="">
            </div>
            <div class="col-4">
                <h2>Information</h2>
                <table class="table table-borderless">
                    <tr>
                        <th class="key pe-5">Name</th>
                        <td>Jordan Air 1</td>
                    </tr>
                    <tr>
                        <th class="key pe-5">Description</th>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe odio ad est impedit quibusdam, minus enim. Saepe ducimus, sit eveniet.</td>
                    </tr>
                    <tr>
                        <th class="key pe-5">Category</th>
                        <td>Jordan</td>
                    </tr>
                    <tr>
                        <th>Sold</th>
                        <td>4000 pcs</td>
                    </tr>
                    <tr>
                        <th>Total Income</th>
                        <td>Rp. 400.000.000,00</td>
                    </tr>
                </table>
                <div class="d-flex">
                    <button class="btn me-2 btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit
                    </button>
                    <button class="btn me-2 btn-danger">
                        Delete
                    </button>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name :</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description :</label>
                                    <textarea rows="8" type="text" id="description" name="name" class="form-control">
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category :</label>
                                    <select id="category" name="name" class="form-control">
                                        <option value="1">Jordan</option>
                                        <option value="2">Nike</option>
                                        <option value="2">Adidas</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Price/Size/Stock</label>
                                    <ul class="m-0 p-0" style="list-style:none;">
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">39</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">40</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">41</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">42</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <h2>Variant</h2>
                <div class="overflow-auto" style="max-height: 20rem;">
                    <table class="table table-fixed">
                        <thead>
                            <th>#</th>
                            <th>Variant Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Blue Navy</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal">
                                        Detail
                                    </button>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#restockVariantModal">
                                        Restock
                                    </button>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVariantModal">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Detail Modal -->
                    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Variant</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>Variant 1</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        <img style="max-width: 10rem" src="{{ asset('img/shoes/jordan2.png') }}" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>
                                        <ul style="list-style:none;max-height:10rem;" class="m-0 p-0 overflow-auto">
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="bg-core text-light px-3 py-2">39</span>
                                                <span class="ms-2">20pcs</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="bg-core text-light px-3 py-2">40</span>
                                                <span class="ms-2">10pcs</span>
                                                <span class="text-danger ms-1">(Perlu Stock)</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="bg-core text-light px-3 py-2">42</span>
                                                <span class="ms-2">5pcs</span>
                                                <span class="text-danger ms-1">(Perlu Stock)</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="bg-core text-light px-3 py-2">43</span>
                                                <span class="ms-2">20pcs</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Restock Modal -->
                    <div class="modal fade" id="restockVariantModal" tabindex="-1" aria-labelledby="restockVariantModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Restock Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <ul class="m-0 p-0" style="list-style:none;">
                                <li class="me-1 mb-1 d-flex">
                                    <div  class="py-2 px-3 bg-core text-light">39</div>
                                    <div class="d-flex align-items-center ps-1">
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                </li>
                                <li class="me-1 mb-1 d-flex">
                                    <div  class="py-2 px-3 bg-core text-light">40</div>
                                    <div class="d-flex align-items-center ps-1">
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                </li>
                                <li class="me-1 mb-1 d-flex">
                                    <div  class="py-2 px-3 bg-core text-light">41</div>
                                    <div class="d-flex align-items-center ps-1">
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                </li>
                                <li class="me-1 mb-1 d-flex">
                                    <div  class="py-2 px-3 bg-core text-light">42</div>
                                    <div class="d-flex align-items-center ps-1">
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                </li>
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Restock</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editVariantModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name :</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Price/Size/Stock</label>
                                    <ul class="m-0 p-0" style="list-style:none;">
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">39</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">40</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">41</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                        <li class="me-1 mb-1 d-flex">
                                            <div  class="py-2 px-3 d-flex justify-content-center align-items-center bg-core text-light">42</div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Stock</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Price(Rp)</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                            <div class="ps-1">
                                                <label for="" class="form-label">Size</label>
                                                <input type="number" name="stock" class="form-control">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')

@endpush
