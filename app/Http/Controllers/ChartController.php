<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Chart;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Size;

class ChartController extends Controller
{
    public function add(Request $request) 
    {
        $validatedData = Validator::make($request->all(), [
            'size_id' => 'required',
            'qty' => 'required'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 400,
                'info' => 'Validation failed',
                'data' => $validatedData->errors()
            ], 400); 
        }

        $size = Size::find($request->size_id);
        $checkChart = Chart::where('user_id', $request->user()->id)->where('size_id', $request->size_id)->first();
        if ($checkChart) {
            return response()->json([
                'status' => 400,
                'info' => 'Failed add to chart',
                'data' => 'This size product has been in your chart'
            ], 400);
        }

        if ($size) {
            $chart = [];
            $chart['user_id'] = $request->user()->id;
            // $chart['product_id'] = $size->variant()->product()->id;
            $chart['product_id'] = $size->variant->product->id;
            $chart['variant_id'] = $size->variant->id;
            $chart['size_id'] = $size->id;
            $chart['qty'] = $request->qty;
            $chart['total_cost'] = $request->qty * $size->price;

            Chart::create($chart);
            return response()->json([
                'status' => 200,
                'info' => 'Add to chart success',
                'data' => $chart
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'info' => 'Size or variant or product not found'
        ], 400);
    }

    public function show(Request $request)
    {
        $chart = Chart::where('user_id', $request->user()->id)->get();
        if ($chart)  {
            return response()->json([
                'status' => 200,
                'info' => 'Data obtained successfully',
                'data' => $chart
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'info' => 'Data not found'
        ], 400);
    }

    public function edit(Request $request, $id) 
    {
        $validatedData = Validator::make($request->all(), [
            'qty' => 'required'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'status' => 400,
                'info' => 'Validation failed',
                'data' => $validatedData->errors()
            ], 400); 
        }

        $chart = Chart::find($id);
        if ($chart) {
            $size = Size::find($chart->size_id);
            $chart->qty = $request->qty;
            $chart->total_cost = $size->price * $request->qty;
            $chart->save();

            return response()->json([
                'status' => 200,
                'info' => 'Data updated successfully',
                'data' => $chart
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'info' => 'Data not found'
        ], 400);
    }

    public function delete($id) 
    {
        $chart = Chart::find($id);
        if ($chart) {
            $chart->delete();
            return response()->json([
                'status' => 200,
                'info' => 'Data deleted successfully'
            ], 200);
        }

        return response()->json([
            'status' => 400,
            'info' => 'Data not found'
        ], 400);
        
    }
}
