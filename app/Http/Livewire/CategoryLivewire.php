<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Product;

class CategoryLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    public $pageLimit = 10;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => '']
    ];
    public $categoryId;
    public $data;
    public $productList = [];
    public $name;
    public $image;

    public function render()
    {
        $this->data = new Category();
        $categories = $this->data->where('name', 'like', '%'.$this->search.'%')->paginate($this->pageLimit);
        return view('livewire.category', [
                'categories' => $categories
        ]);
    }

    public function getProductList($id) {
        try {
            $category = Category::find($id);
            $this->name = $category->name;
            $this->productList = Product::where('active', true)->where('category_id', $id)->get();
        } catch (\Exception $e) {
            Log::debug($e);
            session()->flash('error', 'Terjadi kesalahan sistem, harap segera hubungi admin');
            $this->emit('closeDataProduct');  
        }
    }

    public function resetInput() {
        $this->categoryId = '';
        $this->name = '';
        $this->image = '';
    }
    public function store() {
        try {
            // dd($this->image);
            $validatedData = $this->validate([
                'name' => 'required|unique:categories|max:255',
                'image' => 'required|image'
            ]);

            $validatedData['image'] = Storage::disk('public')->put('image', $this->image);
            Category::create($validatedData);

            $this->resetInput();
            session()->flash('success', 'Data berhasil dibuat');
            $this->emit('dataCreated');
        } catch (Exception $e) {
            Log::debug($e);
            session()->flash('error', 'Terjadi kesalahan sistem, harap segera hubungi admin');
            $this->emit('dataCreated');  
        }
        
    }

    public function edit($id)  {
        try {
            $data = Category::find($id);
            $this->categoryId = $data->id;
            $this->name = $data->name;
        } catch (\Exception $e) {
            Log::debug($e);
            session()->flash('error', 'Terjadi kesalahan sistem, harap segera hubungi admin');
            $this->emit('dataUpdated');              
        }
    }

    public function update() {
        try {
            $validatedData = $this->validate([
                'name' => [
                    'required',
                    Rule::unique('categories')->ignore($this->categoryId),
                    'max:255'
                ],
                'image' => ['nullable', 'image']
            ]);

            $category = Category::find($this->categoryId);
            if ($category) {
                if ($this->image) {
                    Storage::disk('public')->delete($category->image);
                    $category->image = Storage::disk('public')->put('image', $this->image);
                }
                $category->name = $validatedData['name'];
                $category->save();
                session()->flash('success', 'Data berhasil diedit');
                $this->emit('dataUpdated');

            }
            $this->resetInput();
            session()->flash('failed', 'Data not found');
            $this->emit('dataUpdated');
        }
        catch (\Exceptions $e){
            Log::debug($e);
            session()->flash('error', 'Terjadi kesalahan sistem, harap segera hubungi admin');
            $this->emit('dataUpdated');
        }
    }

    public function confirmDelete($id) {
        $this->categoryId = $id;
    }

    public function delete() {
        try {
            $category = Category::find($this->categoryId);
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            Product::where('category_id', $this->categoryId)->update(['category_id' => 1]);
            $category->delete();
            $this->resetInput();
            $this->emit('dataDeleted');
            session()->flash('success', 'Data berhasil diedit');
        } catch (\Exception $e) {
            Log::debug($e);
            session()->flash('error', 'Terjadi kesalahan sistem, harap segera hubungi admin');
        }
        
    }
}
