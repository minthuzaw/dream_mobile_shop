<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPhone;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPhoneSold = OrderPhone::join('phones', 'order_phone.phone_id', '=', 'phones.id')
            ->join('orders', 'order_phone.order_id', '=', 'orders.id')
            ->groupBy('phone_id', DB::raw('YEAR(created_at)'))
            ->select([DB::raw('SUM(quantity) as quantity'), DB::raw('name as phone_name'), DB::raw('YEAR(orders.created_at) as year')])
            ->orderBy('quantity')->get()->toArray();

        $monthlyTotalSales = Order::groupBy([DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)')])
            ->select([DB::raw('SUM(total) as total'), DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year')])
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($totalSale) {
                $month = Carbon::create()->month($totalSale->month)->monthName;
                $year = $totalSale->year;
                $totalSale->sold_at = "$month, $year";

                return $totalSale;
            })->toArray();

        $yearlyTotalSales = Order::groupBy([DB::raw('YEAR(created_at)')])
            ->select([DB::raw('SUM(total) as total'), DB::raw('YEAR(created_at) as year')])
            ->orderBy('year')
            ->get();
        $years = [];

        foreach ($monthlyTotalSales as $sale) {
            if (! in_array($sale['year'], $years)) {
                $years[] += $sale['year'];
            }
        }

        return view('dashboard', compact('monthlyTotalSales', 'years', 'totalPhoneSold', 'yearlyTotalSales'));
    }
}
