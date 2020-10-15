<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Order;
class AdminController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $current_month = $now->format('m');  // 07
        $current_year = $now->format('Y');  // 2020
        for($i=1; $i <= $current_month; $i++ ){
            $arr['Tháng 0'. $i] = Order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$current_year)->sum('total'); 
        }
        $data['currentMonth'] = $current_month;
        $data['chartData'] = $arr;
        $data['totalOrder'] = Order::where('state',2)->whereYear('updated_at',$current_year)->count();
        return view('backend.index', $data);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
