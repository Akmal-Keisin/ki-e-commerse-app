<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductLivewire extends Component
{
    public $categories;
    public $productList;
    public $product;
    public $productId;
    public $productCategoryId;
    public $productName;
    public $productDescription;
    public $productImage;

    public function render()
    {
        $this->categories = Category::all();
        $this->productList = Product::all();
        return view('livewire.product-livewire');
    }

    public function resetInput() {
        $this->productName = '';
        $this->productCategoryId = '';
        $this->productDescription = '';
        $this->productImage = '';  
    }

    use WithFileUploads;
    public function store() 
    {
        // dd($this);
        $validatedData = $this->validate([
            'productName' => 'required',
            'productCategoryId' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required|image'
        ]);
        try {
            $validatedData['productImage'] = Storage::disk('public')->put('image', $this->productImage);
            $product = Product::create([
                'name' => $validatedData['productName'],
                'category_id' => $validatedData['productCategoryId'],
                'description' => $validatedData['productDescription'],
                'image' => $validatedData['productImage']
            ]);

            $this->resetInput();
            session()->flash('success', 'Data berhasil dibuat');
            $this->emit('dataCreated');
        } catch (\Exception $e) {
            Log::debug($e);
            session()->flash('failed', 'Terjadi kesalahan sistem, harap segera hubungi admin');
            $this->emit('dataCreated');
        }
    }

    public function getProduct($id) 
    {
        $this->product = $this->productList->find($id);
    }
}
