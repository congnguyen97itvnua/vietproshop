<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class FrontendController extends Controller
{
    public function index(){
        $newest_prd = Product::orderBy('id','desc')->take(8)->get();
        $featured_prd = Product::where('featured',1)->orderBy('id','desc')->take(4)->get();
        $data['newest'] = $newest_prd;
        $data['featured'] = $featured_prd;
        return view('frontend.index',$data);
    }

    public function about(){
        echo "Đây là trang giới thiệu";
    }
    
    public function contact(){
        echo "Đây là trang liên hệ";
    }
}
