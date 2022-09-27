<!-- Add Image Slider Modal -->
<div wire:ignore.self class="modal fade" id="imageSlider" tabindex="-1" aria-labelledby="imageSliderLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      @if($msg = session()->get('addImageSliderSuccess'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif($msg = session()->get('editImageSliderSuccess'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif($msg = session()->get('deleteImageSliderSuccess'))
        <div class="alert alert-success alert-dismissible fade show m-3"role="alert">
            {{ $msg }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="modal-header">
        <h5 class="modal-title" id="addImageSliderLabel">Image Slider</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Image Slider List</h2>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageSlider">Add</button>
        </div>
        <div class="row align-items-end">
          @forelse($imageSliders as $image)
          <div class="col-2">
            <img src="{{ asset('storage/' . $image['image']) }}" alt="image_slider" class="img-fluid">
            <div class="my-2 d-flex justify-content-center">
              <button wire:click="setImageSliderId({{ $image['id'] }})" class="me-1 btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editImageSlider">Edit</button>
              <button wire:click="setImageSliderId({{ $image['id'] }})" data-bs-toggle="modal" data-bs-target="#alertImageSliderModal" class="ms-1 btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
          @empty
          <p class="text-center">Image Slider Empty</p>
          @endforelse
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#detailProduct" role="button">Back</a>
      </div>
    </div>
  </div>
</div>