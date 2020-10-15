<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(5);
        return view('backend.product.listproduct',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('backend.product.addproduct',compact('categories'));
    }
    public function store(AddProductRequest $request){
        // dd($request->hasFile('img'));
        $product = new Product; // Product::find($id)

        $product->category_id = $request->category;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name,'-');
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->info = $request->info;
        $product->description = $request->describe;
        if($request->hasFile('img')){
         
            $file= $request->img;
            $file_name = Str::slug($product->name,'_').'.'.$file->getClientOriginalExtension();
            // upload ảnh lên server
            $path = public_path().'/uploads';
            $file->move($path,$file_name);


            // xóa ảnh cũ khi edit sản phẩm
            // $old_path =   public_path().'/uploads'.'/'.$product->img;
            // unlink($old_path);
            // https://stackoverflow.com/questions/33842735/how-to-delete-file-from-public-folder-in-laravel-5-1
            // lưu tên vào csdl
            $product->img = $file_name;
            
        }else{
            $product->img = 'no-img.jpg';
        }
        $product->save();
        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    }
    public function edit(){
        return view('backend.product.editproduct');
    }
    public function delete(){
    }
}
