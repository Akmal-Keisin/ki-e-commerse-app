<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Category;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class SalesReportLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $totalPenghasilan;
    public $totalPengeluaran;

    public function mount() 
    {
        $this->totalPenghasilan = Checkout::all()->sum('final_cost_total');
        $this->totalPengeluaran = Expense::all()->sum('final_cost_total');
    }

    public function render()
    {
        $checkout = Checkout::with('user')->paginate(10);
        $expense = Expense::paginate(10);
        return view('livewire.sales-report-livewire', [
            'checkout' => $checkout,
            'expense' => $expense
        ]);
    }
}
