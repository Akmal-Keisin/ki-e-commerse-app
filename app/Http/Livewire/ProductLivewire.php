<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use App\Models\Product;
use App\Models\Variant;
use App\Models\ImageSlider;
use App\Models\Size;

class ProductLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    protected $queryString = [
        'search' => ['except' => '']
    ];
    protected $paginationTheme = 'bootstrap';
    public $pageLimit = 8;
    public $categories;

    public $inputs = [];
    public $i = 0;

    public $variants;
    public $variantId;
    public $variantName;
    public $variantImage;
    public $variant;
    public $variantSizeList = [];
    public $variantEditSizeToDelete = [];
    public $sizes;


    public $productList;
    public $product;
    public $productId;
    public $productCategoryId;
    public $productName;
    public $productRating;
    public $productDescription;
    public $productImage;

    public $imageSlider;
    public $imageSliderId;
    public $imageSliders = [];

    public function render()
    {
        $this->categories = Category::all();
        $products = Product::where('name', 'like', '%'.$this->search.'%')->paginate($this->pageLimit);
        
        return view('livewire.product-livewire', [
            'products' => $products
        ]);
    }

    // Sizes
    public function setProductId($id) 
    {
        $this->productId = $id;
    }
    public function resetInputSizes() 
    {
        $this->variantName = '';
        $this->variantImage = '';
        $this->sizes = [];
        $this->variantSizeList = [];
        $this->variantEditSizeToDelete = [];
    }

    public function addSizes($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function removeSizes($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInput() 
    {
        $this->productName = '';
        $this->productCategoryId = '';
        $this->productDescription = '';
        $this->productImage = '';  
        $this->productRating = '';  
    }

    // Variant

    // Add variant
    public function addVariant() 
    {
        $validatedData = $this->validate([
            'variantName' => 'required',
            'variantImage' => 'required|image',
            'sizes.*.stock' => 'required|numeric|min:1',
            'sizes.*.size' => 'required|numeric|min:1',
            'sizes.*.price' => 'required|numeric|min:1',
            'sizes' => 'required',
        ]);

        $this->variantImage = Storage::disk('public')->put('image', $this->variantImage);
        $variant = Variant::create([
            'product_id' => $this->productId,
            'name' => $this->variantName,
            'image' => $this->variantImage,
        ]);

        $this->variants->push($variant);

        $expenseDetail = [];
        $finalCostTotal = 0;
        foreach($this->sizes as $key => $value) {
            $size = Size::create([
                'variant_id' => $variant->id,
                'size' => $value['size'],
                'stock' => $value['stock'],
                'price' => $value['price']
            ]);

            array_push($expenseDetail, [
                'product_id' => $variant->product_id,
                'variant_id' => $variant->id,
                'size_id' => $size->id,
                'qty' => $value['stock'],
                'cost_total' => $value['stock'] * $value['price']
            ]);
            $finalCostTotal += $value['stock'] * $value['price'];
        }

        $expenses = Expense::create([
            'admin_id' => Auth::user()->id,
            'final_cost_total' => $finalCostTotal,
            'type' => 'New'
        ]);

        foreach ($expenseDetail as $expense) {
            ExpenseDetail::create([
                'product_id' => $expense['product_id'],
                'variant_id' => $expense['variant_id'],
                'size_id' => $expense['size_id'],
                'qty' => $expense['qty'],
                'cost_total' => $expense['cost_total'],
                'expense_id' => $expenses->id
            ]);
        }

        $this->inputs = [];
        $this->resetInputSizes();

        session()->flash('addVariantSuccess', 'Data berhasil dibuat');
        $this->emit('variantCreated');
    }

    // Get single variant
    public function getVariant($id)
    {
        $variant = Variant::find($id);
        $this->variantName = $variant->name;
        $this->variantImage = $variant->image;
        $this->variantSizeList = Size::where('variant_id', $variant->id)->get()->toArray();
        $this->variantId = $variant->id;
    }

    // Set property to edit variant
    public function getEditVariant($id)
    {
        $variant = Variant::find($id);
        $this->variantId = $variant->id;
        $this->variantName = $variant->name;

        $image = explode('image/', $variant->image);
        $this->variantImage = $image[1];
        $this->variantSizeList = Size::where('variant_id', $id)->get()->toArray();
    }

    // Add size while edit variant
    public function addEditSize() 
    {
        $size['size'] = '';
        $size['stock'] = '';
        $size['price'] = '';
        array_push($this->variantSizeList,$size);
    }

    // Delete size while edit vairant
    public function deleteEditSize($id)
    {
        foreach ($this->variantSizeList as $key => $value) {
            if ($key == $id) {
                if (isset($this->variantSizeList[$key]['id']) && $this->variantSizeList[$key]['id']) {
                    Size::find($this->variantSizeList[$key]['id'])->delete();
                }
                unset($this->variantSizeList[$key]);
            }
        }
        array_push($this->variantEditSizeToDelete, $id);
    }

    // Update variant
    public function updateVariant() 
    {
        // dd($this->variantImage);
        $validatedData = $this->validate([
            'variantName' => 'required',
            'variantSizeList.*.stock' => 'required|numeric|min:1', 
            'variantSizeList.*.size' => 'required|numeric|min:1', 
            'variantSizeList.*.price' => 'required|numeric|min:1' ,
            'variantSizeList' => 'required',
        ]);

        $variant = Variant::find($this->variantId);
        if ($variant) {
            $variant->name = $this->variantName;
            $image = explode('image/', $variant->image);
            if ($this->variantImage !=  $image[1]) {
                $test = Storage::disk('public')->delete($variant->image);
                $variant->image = Storage::disk('public')->put('image', $this->variantImage);
            }
            if (count($this->variantEditSizeToDelete) != 0) {
                Size::where('variant_id', $variant->id)->whereIn('id', $this->variantEditSizeToDelete)->delete();
            }

            foreach($this->variantSizeList as $key => $value) {
                if (isset($value['id'])) {
                    Size::find($value['id'])->update(
                        [
                            'variant_id' => $variant->id,
                            'size' => $value['size'],
                            'stock' => $value['stock'],
                            'price' => $value['price']
                        ]
                    );
                } else {
                    Size::create(
                        [
                            'variant_id' => $variant->id,
                            'size' => $value['size'],
                            'stock' => $value['stock'],
                            'price' => $value['price']
                        ]
                    );
                }
            }

            $variant->save();
            $this->variants = Variant::where('product_id', $variant->product_id)->get();
            $this->resetInputSizes();
            session()->flash('updateVariantSuccess', 'Data berhasil diupdate');
            $this->emit('variantUpdated');
        }
    }

    // Restock variant product
    public function restockProductVariant() 
    {
        foreach ($this->variantSizeList as $size => $value) {
            Size::find($value['id'])->update([
                'stock' => $value['stock']
            ]);
        }
        $this->resetInputSizes();
        session()->flash('restockSuccess', 'Product berhasil direstock');
        $this->emit('restockSuccess');
    }

    // Set variant id
    public function setVariantId($id) 
    {
        $this->variantId = $id;
    }

    // Delete variant
    public function deleteVariant() 
    {
        $variant = Variant::find($this->variantId);
        Storage::disk('public')->delete($variant->image);
        $this->variants = Variant::where('product_id', $this->productId)->get();
        $variant->delete();

        $this->emit('deleteVariantSuccess');
        session()->flash('deleteVariantSuccess', 'Variant berhasil didelete');
    }

    // Products


    // Store product
    public function store() 
    {
        // dd($this);
        $validatedData = $this->validate([
            'productName' => 'required',
            'productCategoryId' => 'required',
            'productRating' => 'required|numeric|between:1,5.0',
            'productDescription' => 'required',
            'productImage' => 'required|image'
        ]);
        $validatedData['productImage'] = Storage::disk('public')->put('image', $this->productImage);
        $product = Product::create([
            'name' => $validatedData['productName'],
            'category_id' => $validatedData['productCategoryId'],
            'description' => $validatedData['productDescription'],
            'image' => $validatedData['productImage'],
            'rating' => $validatedData['productRating']
        ]);

        $this->resetInput();
        session()->flash('success', 'Data berhasil dibuat');
        $this->emit('dataCreated');
    }

    // Get product
    public function getProduct($id) 
    {
        $this->product = Product::find($id);
        $this->productId = $id; 
        $this->variants = Variant::where('product_id', $id)->get();
        $this->imageSliders = ImageSlider::where('product_id', $this->product->id)->get()->toArray();
    }

    // Set property to edit product
    public function setPropertyEditProduct()
    {
        $this->productDescription = $this->product->description;
        $this->productName = $this->product->name;
        $this->productCategoryId = $this->product->category_id;
        $image = explode('image/', $this->product->image);
        $this->productImage = $image[1];
        $this->productRating = $this->product->rating;
    }

    // Edit product
    public function editProduct() {
        $validatedData = $this->validate([
            'productName' => 'required',
            'productCategoryId' => 'required',
            'productDescription' => 'required',
            'productRating' => 'required|numeric|between:1,5.0',
        ]);

        $product = Product::find($this->product->id);
        if($product) {
            $image = explode('image/', $product->image);
            if ($this->productImage !=  $image[1]) {
                $test = Storage::disk('public')->delete($product->image);
                $product->image = Storage::disk('public')->put('image', $this->productImage);
            }
            $product->name = $validatedData['productName'];
            $product->category_id = $validatedData['productCategoryId'];
            $product->description = $validatedData['productDescription'];
            $product->rating = $validatedData['productRating'];
            $product->save();

            $this->product = $product;
            $this->resetInput();
            session()->flash('updateProductSuccess', 'Data berhasil diupdate');
            $this->emit('productUpdated');
        }
    }

    public function activateProduct() {
        $product = Product::find($this->product->id);
        if ($product) {
            $product->active = ($this->product->active == 'active') ? "nonActive" : "active";
            $product->save();
            $this->product = $product;
            session()->flash('activateSuccess', 'Produk berhasil diaktifkan');
            $this->emit('productActivated');
        }
    }

    public function deleteProduct()
    {
        $product = Product::find($this->product->id);
        if($product) {
            Storage::disk('public')->delete($product->image);
            $product->delete();
            session()->flash('productDeleted', 'Produk berhasil dihapus');
            $this->emit('productDeleted');
        }
    }

    public function addImageSlider()
    {
        $validatedData = $this->validate([
            'imageSlider' => 'required|image'
        ]);

        $imageSlider = new ImageSlider();
        $imageSlider->product_id = $this->product->id;
        $imageSlider->image = Storage::disk('public')->put('image', $this->imageSlider);
        $imageSlider->save();

        array_push($this->imageSliders, $imageSlider);

        session()->flash('addImageSliderSuccess', 'Gambar berhasil ditambahkan');
        $this->emit('addImageSliderSuccess');
    }

    public function setImageSliderId($id) 
    {
        $this->imageSliderId = $id;
    }

    public function editImageSlider()
    {
        $validatedData = $this->validate([
            'imageSlider' => 'required|image'
        ]);
        $imageSlider = ImageSlider::find($this->imageSliderId);
        if ($imageSlider) {
            $image = explode('image/', $imageSlider->image);
            if ($this->imageSlider != $image) {
                Storage::disk('public')->delete($imageSlider->image);
                $imageSlider->image = Storage::disk('public')->put('image', $this->imageSlider);
                $imageSlider->save();
                $this->imageSliders = ImageSlider::where('product_id', $this->product->id)->get()->toArray();
                session()->flash('editImageSliderSuccess', 'Gambar berhasil diedit');
                $this->emit('editImageSliderSuccess');
                $this->imageSlider = '';
            }
        }
    }

    public function removeImageSlider()
    {
        $imageSlider = ImageSlider::find($this->imageSliderId);
        Storage::disk('public')->delete($imageSlider->image);
        $imageSlider->delete();
            session()->flash('deleteImageSliderSuccess', 'Gambar berhasil dihapus');
            $this->emit('deleteImageSliderSuccess');
            $this->imageSliders = ImageSlider::where('product_id', $this->product->id)->get()->toArray();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sizes.*.stock.required' => 'Stock required',
            'sizes.*.size.required' => 'Size required',
            'sizes.*.price.required' => 'Price required',
            'sizes.*.stock.numeric' => 'Stock must be numeric',
            'sizes.*.size.numeric' => 'Size must be numeric',
            'sizes.*.price.numeric' => 'Price must be numeric',
            'variantSizeList.*.size.required' => 'Size required',
            'variantSizeList.*.stock.required' => 'Stock required',
            'variantSizeList.*.price.required' => 'Price required',
            'variantSizeList.*.size.numeric' => 'Size must be numeric',
            'variantSizeList.*.stock.numeric' => 'Stock must be numeric',
            'variantSizeList.*.price.numeric' => 'Price must be numeric',
            'variantSizeList.required' => 'Variant size cannot be empty',
        ];
    }
}
