<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ReportController extends Controller
{
    public function user() 
    {
        $userReport = User::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
                    ->groupBy('year', 'month')
                    ->get()->toArray();
        return response()->json([
            'status' => 200,
            'info' => 'Data obtained successfully',
            'data' => $userReport
        ], 200);
    }
}
