<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Category;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use Illuminate\Support\Facades\DB;

class SalesReportLivewire extends Component
{
    public $checkout;
    public $expense;
    public $totalPenghasilan;
    public $totalPengeluaran;

    public function mount() 
    {
        $this->checkout = Checkout::with('user')->get();
        $this->expense = Expense::all();
        $this->totalPenghasilan = Checkout::all()->sum('final_cost_total');
        $this->totalPengeluaran = Expense::all()->sum('final_cost_total');
    }

    public function render()
    {
        return view('livewire.sales-report-livewire');
    }
}
