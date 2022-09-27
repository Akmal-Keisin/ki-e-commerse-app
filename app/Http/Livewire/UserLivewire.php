<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserLivewire extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $userId;
    public $userName;
    public $userPhone;
    public $userImage;
    public $userPassword;


    public function render()
    {
        $users = User::where('role', 'user')->get();
        $newUsers = User::whereDate('created_at', date('Y-m-d'))->where('role', 'user')->get();
        $totalUsers = count($users);
        $totalUsersThisDay = count($newUsers);
        $totalUsersThisMonth = User::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->where('role', 'User')->count();
        $totalUsersThisYear = User::whereYear('created_at', date('Y'))->where('role', 'User')->count();
        $userReport = User::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
                ->groupBy('year', 'month')
                ->get()->toArray();
        foreach ($userReport as $key => $report) {
            $monthNum  = $report['month'];
            $userReport[$key]['month'] = date('F', mktime(0, 0, 0, $monthNum, 10)); // March
        }
        // dd($userReport);
        return view('livewire.user-livewire', [
            'users' => $users,
            'newUsers' => $newUsers,
            'totalUsers' => $totalUsers,
            'totalUsersThisDay' => $totalUsersThisDay,
            'totalUsersThisMonth' => $totalUsersThisMonth,
            'totalUsersThisYear' => $totalUsersThisYear,
            'userReport' => json_encode($userReport)
        ]);
    }

    public function resetInput() {
        $this->userName = ''; 
        $this->userPhone = ''; 
        $this->userImage = ''; 
        $this->userPassword = ''; 
    }

    public function addUser() 
    {
        $validatedData = $this->validate([
            'userName' => 'required',
            'userPhone' => 'required|numeric|unique:users,phone_number',
            'userImage' => 'required|image',
            'userPassword' => 'required'
        ]);

        $user = new User();
        $user->name = $validatedData['userName'];
        $user->phone_number = $validatedData['userPhone'];
        $user->password = Hash::make($validatedData['userPassword']);
        $user->role = 'User';
        $user->image = Storage::disk('public')->put('image', $this->userImage);
        $user->save();

        $this->resetInput();
        session()->flash('success', 'User created successfully');
        $this->emit('userCreated');
    }

    public function setUserProperty($id)
    {
        $user = User::find($id);
        $image = explode('image/', $user->image);
        $this->userName = $user->name; 
        $this->userPhone = $user->phone_number; 
        $this->userImage = $image[1]; 
        $this->userId = $user->id; 
    }

    public function updateUser() 
    {
        $validatedData = $this->validate([
            'userName' => 'required',
            'userPhone' => 'required|numeric',
            // 'userPassword' => 'required'
        ]);

        $user = User::find($this->userId);
        if($user) {
            $user->name = $validatedData['userName'];
            $user->phone_number = $validatedData['userPhone'];
            $user->role = 'User';

            if($this->userPassword != $user->password) {
                $user->password = Hash::make($this->userPassword);
            }

            $image = explode('image/', $user->image);
            if($image[1] != $this->userImage) {
                $test = Storage::disk('public')->delete($user->image);
                $user->image = Storage::disk('public')->put('image', $this->userImage);
            }
            $user->save();

            $this->resetInput();
            session()->flash('success', 'User Updated successfully');
            $this->emit('userUpdated');
        }
    }

    public function deleteUser() 
    {
        $user = User::find($this->userId);
        if($user) {
            Storage::disk('public')->delete($user->image);
            $user->delete();

            $this->resetInput();
            session()->flash('success', 'User Deleted successfully');
            $this->emit('userDeleted');
        }
    }
}
