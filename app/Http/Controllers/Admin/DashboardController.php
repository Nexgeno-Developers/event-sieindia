<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $pageInfo = array(
            'name' => 'dashboard'
        );

        $paidOrders    = DB::table('orders')->where('payment_status', 'paid')->count();
        $unpaidOrders  = DB::table('orders')->where('payment_status', 'unpaid')->count();
        $createdOrders = DB::table('orders')->where('payment_status', 'created')->count();
        $totalOrders   = DB::table('orders')->count();

        return view('admin.dashboard.index')->with(compact('pageInfo', 'paidOrders', 'unpaidOrders', 'createdOrders', 'totalOrders'));
    }
}
