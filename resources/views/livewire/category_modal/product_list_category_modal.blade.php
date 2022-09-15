<!-- Product List Category Modal -->
<div wire:ignore.self class="modal fade" id="productList" tabindex="-1" aria-labelledby="productList" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $name }} Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          @forelse($productList as $product) 
            <div class="col-lg-3 mb-3">
                <a href="#" class="card p-2 card-product text-decoration-none text-dark">
                    <div class="card-head">
                        <img class="w-100" src="{{ asset('img/shoes/jordan2.png') }}">
                    </div>  
                    <div class="card-body p-0 mt-2">
                        <h3 class="fw-bold m-0">{{ $product->name }}</h3>
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
                        <p class="">{{ $product->description }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="p-0 m-0 text-danger">20 Stock</p>
                        <button class="btn btn-primary">Detail</button>
                    </div>
                </a>
            </div>
          @empty 

          @endforelse
        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>