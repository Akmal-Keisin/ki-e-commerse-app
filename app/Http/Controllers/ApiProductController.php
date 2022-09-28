<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ImageSlider;

class ApiProductController extends Controller
{
    public function index() 
    {
        $product = Product::when(request('search'), function($query) {
            $query->where('active', 'active')->where('name', 'like', '%' . request('search') . '%');
        }, function ($query) {
            $query->where('active', 'active');
        }); 

        if (request('paginate')) {
            $product = $product->simplePaginate(request('paginate'));
        } else {
            $product = $product->get();
        }

        return response()->json([
            'status' => 200,
            'info' => 'Data obtained successfully',
            'data' => $product
        ], 200);
    }

    public function show($id) 
    {
        $product = Product::find($id);
        if ($product) {
            $imageSlider = ImageSlider::where('product_id', $product->id)->get();
            foreach($imageSlider as $image) {
                $image['image'] = env('APP_URL') . '/storage/' . $image['image'];
            }
            $product['variants'] = $product->variants;
            if (count($product['variants']) > 0) {
                foreach($product['variants'] as $variant) {
                    $product['variants']['sizes'] = $variant->sizes;
                }
            }
            return response()->json([
                'status' => 200,
                'info' => 'Data obtained successfully',
                'data' => $product,
                'image_sliders' => $imageSlider 
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'info' => 'Data not found'
        ], 400);
    }
}
