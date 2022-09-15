<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="row">
                <div class="col-6">
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
                </div>
                <div class="col-6">
                    
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
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
        <button type="button" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>