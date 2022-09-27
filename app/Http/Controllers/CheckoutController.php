<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Chart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Checkout;
use App\Models\CheckoutDetail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'alamat' => 'requierd|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'notes' => 'nullable|string'
        ]);
        $charts = Chart::where('user_id', $request->user()->id)->get();
        if (count($charts) == 0) {
            return response()->json([
                'status' => 400,
                'info' => 'Failed to checkout',
                'data' => 'Your chart is empty'
            ], 400);
        }

        $finalCost = 0;
        foreach($charts as $chart) {
            $size = Size::find($chart->size_id);
            if ($size) {
                $product = Product::find($chart->product_id);   
                if ($product && $product->active == 'active') {
                    $finalCost += $chart->total_cost;
                }   
                else {
                    return response()->json([
                        'status' => 400,
                        'info' => 'Failed to checkout',
                        'data' => "Product $chart->product_id not found"
                    ], 400);
                }
            }
            else {
                return response()->json([
                    'status' => 400,
                    'info' => 'Failed to checkout',
                    'data' => 'Size not found'
                ], 400);
            }
        }

        $checkout = Checkout::create([
            'user_id' => $request->user()->id,
            'address' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'notes' => ($request->notes) ? $request->notes : null,
            'final_cost_total' => $finalCost
        ]);

        $checkoutDetails = [];

        foreach ($charts as $chart) {
            $checkoutDetails[] = CheckoutDetail::create([
                'checkout_id' => $checkout->id,
                'product_id' => $chart->product_id,
                'variant_id' => $chart->variant_id,
                'size_id' => $chart->variant_id,
                'qty' => $chart->qty,
                'total_cost' => $chart->total_cost
            ]);
        }

        Chart::where('user_id', $request->user()->id)->delete();

        return response()->json([
            'status' => 200,
            'info' => 'Checkout success',
            'data' => $checkout,
            'product' => $checkoutDetails
        ], 200);
    }
}
