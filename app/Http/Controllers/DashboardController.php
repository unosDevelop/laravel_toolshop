<?php

namespace App\Http\Controllers;

use App\Models\ItemUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $totalPerCondition = ItemUnit::select('condition', DB::raw('count(*) as total'))
                                    ->groupBy('condition')
                                    ->get();

        $categoriesPerCondition = ItemUnit::select('condition', 'items.name as item_name', DB::raw('count(*) as total'))
                                          ->join('items', 'items.id', '=', 'item_units.item_id')
                                          ->join('categories', 'categories.id', '=', 'items.category_id')
                                          ->groupBy('condition', 'items.name')
                                          ->get()
                                          ->groupBy('condition');

        // dd($totalPerCondition, $categoriesPerCondition);
        return view('admin.dashboard', [
            'totalPerCondition' => $totalPerCondition,
            'categoriesPerCondition' => $categoriesPerCondition
        ]);
    }
}
