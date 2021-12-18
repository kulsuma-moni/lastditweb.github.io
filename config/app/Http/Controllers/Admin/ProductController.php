<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use Str;
use Image;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products =  product::where('status',1)->get();
        return view('admin.product.index_product',compact('products'));
    }

    public function create()
    {
        $categories =  Category::all();
        $brands =  Brand::all();
    	return view('admin.product.create_product',compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
        ]);

        $product = Product::create([

            'name'=>$request->name,
            'slug'=> Str::slug($request->name).'-'.time(),
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
            'image2'=>$request->image2,
            'price'=>$request->price,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        $this->storeImage($product);
        if($product){
            $notification = array(
                'messege' =>'Product added successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    //PRODUCT EDIT
    public function edit(Product $product,Request $request)
    {
        $categories =  Category::all();

        return view('admin.product.edit_product',compact('product','categories'));
    }


    //PRODUCT UPDATE

    public function update(Product $product,Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);


         if($request->has('image')){
             if($request->old_image){
                 unlink('storage/'.$request->old_image);
             }
             $product->update([
                 'image' => $request->image->store('admin/product','public'),
             ]);
             $resize = Image::make('storage/'.$product->image)->resize(490,null,function ($constraint) {
                $constraint->aspectRatio();
            });
             $resize->save();
         }
         if($request->has('image2')){
             if($request->old_image2){
                 unlink('storage/'.$request->old_image2);
             }
             $product->update([
                 'image2' => $request->image2->store('admin/product','public'),
             ]);
             $resize = Image::make('storage/'.$product->image2)->resize(490,null,function ($constraint) {
                $constraint->aspectRatio();
            });
             $resize->save();
         }



        $product->update([

            'name'=>$request->name,
            'slug'=> Str::slug($request->name).'-'.time(),
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            // 'image'=>$request->image,
            // 'image2'=>$request->image2,
            'description'=>$request->description,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        // $this->storeImage($product);
        if($product){
            $notification = array(
                'messege' =>'Product updated successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function delete(product $product)
    {
        if($product->image){
        unlink('storage/'.$product->image);
        }
        if($product->image2){
        unlink('storage/'.$product->image2);
        }
      
        $product->delete();
        if($product){
            $notification = array(
                'messege' =>'Product Deleted successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    
    public function active(product $product)
    {
        $product->update(['status' => 1]);
        if($product){
            $notification = array(
                'messege' =>'Product activate successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    
    public function deactive(product $product)
    {
        $product->update(['status' => 0]);
        if($product){
            $notification = array(
                'messege' =>'Product deactivate successfull',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' =>'Ups!!something went wrong!',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deactiveList()
    {
        $products =product::where('status',0)->get();
        return view('admin.product.deactive_product',compact('products'));
    }

    public function activeList()
    {
        $products =product::where('status',1)->get();
        return view('admin.product.product_deactive',compact('products'));
    }




    //PUBLIC FUNCTIONS
    // private function validateRequest()
    // {
        
    //     return request()->validate([
    //         'name'=>'required',
    //         'slug'=> 'required',
    //         'category_id'=>'required',
    //         'quantity'=>'required',
           
    //         'price'=>'required',
    //         'description'=>'required',
            
    //     ]);
    // }


    private function storeImage($product)
    {
        if(request()->hasFile('image')){
            $product->update([
                'image' => request()->image->store('admin/product','public'),
            ]);
            $resize = Image::make('storage/'.$product->image)->resize(490,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
         if(request()->hasFile('image2')){
            $product->update([
                'image2' => request()->image2->store('admin/product','public'),
            ]);
            $resize = Image::make('storage/'.$product->image2)->resize(490,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize->save();
        }
    }
}
