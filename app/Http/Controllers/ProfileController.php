<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function get(Request $request) 
    {
        $data = $request->user();
        $data['image'] = asset('storage/' . $data['image']);
        unset($data['role']);
        return response()->json([
            'status' => 200,
            'info' => 'Data obtained successfully',
            'data' => $data
        ], 200);
    }

    public function update(Request $request) 
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
            'image' => 'nullable|image',
            'password' => 'nullable'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 400,
                'info' => 'Validation failed',
                'data' => $validatedData->errors()
            ], 400);
        }

        $user = User::where('role', 'User')->where('id', $request->user()->id)->first();
        if ($user) {
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->password = ($request->password) ? Hash::make($request->password) : $user->password;
            if ($request->file('image')) {
                Storage::disk('public')->delete($user->image);
                $user->image = Storage::disk('public')->put('image', $request->file('image'));
            }
            $user->save();
            $data = $user;
            unset($data['role']);
            $data['image'] = asset('storage/' . $data['image']);
            return response()->json([
                'status' => 200,
                'info' => 'Data updated successfully',
                'data' => $user
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'info' => 'User not found',
        ], 400);
    }
}
