<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLivewire extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $adminId;
    public $adminName;
    public $adminPhone;
    public $adminImage;
    public $adminPassword;


    public function render()
    {
        $admins = User::all();
        return view('livewire.admin-livewire', [
            'admins' => $admins,
        ]);
    }

    public function resetInput() {
        $this->adminName = ''; 
        $this->adminPhone = ''; 
        $this->adminImage = ''; 
        $this->adminPassword = ''; 
    }

    public function addAdmin() 
    {
        $validatedData = $this->validate([
            'adminName' => 'required',
            'adminPhone' => 'required|numeric',
            'adminImage' => 'required|image',
            'adminPassword' => 'required'
        ]);

        $admin = new User();
        $admin->name = $validatedData['adminName'];
        $admin->phone_number = $validatedData['adminPhone'];
        $admin->password = Hash::make($validatedData['adminPassword']);
        $admin->image = Storage::disk('public')->put('image', $this->adminImage);
        $admin->role = "Admin";
        $admin->save();

        $this->resetInput();
        session()->flash('success', 'Admin created successfully');
        $this->emit('userCreated');
    }

    public function setAdminProperty($id)
    {
        $admin = User::find($id);
        $image = explode('image/', $admin->image);
        $this->adminName = $admin->name; 
        $this->adminPhone = $admin->phone_number; 
        $this->adminImage = $image[1]; 
        $this->adminId = $admin->id; 
    }

    public function updateAdmin() 
    {
        $validatedData = $this->validate([
            'adminName' => 'required',
            'adminPhone' => 'required|numeric',
            // 'adminPassword' => 'required'
        ]);

        $admin = User::find($this->adminId);
        if($admin) {
            $admin->name = $validatedData['adminName'];
            $admin->phone_number = $validatedData['adminPhone'];

            if($this->adminPassword != $admin->password) {
                $admin->password = Hash::make($this->adminPassword);
            }

            $image = explode('image/', $admin->image);
            if($image[1] != $this->adminImage) {
                $test = Storage::disk('public')->delete($admin->image);
                $admin->image = Storage::disk('public')->put('image', $this->adminImage);
            }
            $admin->save();

            $this->resetInput();
            session()->flash('success', 'Admin Updated successfully');
            $this->emit('adminUpdated');
        }
    }

    public function deleteAdmin() 
    {
        $admin = User::find($this->adminId);
        if($admin) {
            Storage::disk('public')->delete($admin->image);
            $admin->delete();

            $this->resetInput();
            session()->flash('success', 'User Deleted successfully');
            $this->emit('adminDeleted');
        }
    }
}
