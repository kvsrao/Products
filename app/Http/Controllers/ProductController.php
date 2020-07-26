<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products-list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // return request()->payment_mode;

        $request->validate([
            'product_name' =>  ['required', 'string', 'max:255','unique:products'],
        ]);
        $data = $request->toArray();
        unset($data['_token']);


        if($request->hasFile('image')){

            $request->validate([
                'image.*' =>  ['image:mimes:jpeg,png,jpg,gif,svg:max:2048'],
            ]);

            foreach($request->image as $img){

                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $img->getClientOriginalName();
                
                // $path = $img->store($imageName);
                // $imgnames[] = $path;

                $img->move(public_path().'/images/',$imageName);
                $imgs[] = '/images/'.$imageName;
            }
        }





        $data = array(
            "product_name"=>$request->product_name,
            "description"=>@$request->description,
            "image"=>@json_encode($imgs),
            "category"=>@json_encode($request->category),
            "product_no"=>mt_rand(100000, 999999),
            "stock"=>@$request->stock,
            "available_stock"=>@$request->available_stock,
            "publish_date"=>$request->publish_date ?? now(),
            "review_enable"=>@$request->review_enable,
            "comment_enable"=>@$request->comment_enable,
            "shipping_option"=>@json_encode($request->shipping_option),
            "payment_mode"=>@json_encode($request->payment_mode),
        );

        $ret = Product::create($data);
        // return $ret;
        if($ret){
            Session::flash('pmessage', 'Product Added Successfully'); 
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product = Product::find($id);
        // return $product;
        return view('product-edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $request->validate([
            'product_name' =>  ['required', 'string', 'max:255',"unique:products,product_name,$id"],
        ]);
        $data = $request->toArray();
        unset($data['_token']);
        if($request->hasFile('image')){
            $request->validate([
                'image.*' =>  ['image:mimes:jpeg,png,jpg,gif,svg:max:2048'],
            ]);
            foreach($request->image as $img){
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $img->getClientOriginalName();
                // $path = $img->store($imageName);
                // $imgnames[] = $path;
                $img->move(public_path().'/images/',$imageName);
                $imgs[] = '/images/'.$imageName;
            }
        }


        $data = array(
            "product_name"=>$request->product_name,
            "description"=>@$request->description,
            "image"=>@$imgs,
            "category"=>@$request->category,
            "product_no"=>mt_rand(100000, 999999),
            "category"=>@$request->category,
            "stock"=>@$request->stock,
            "available_stock"=>@$request->available_stock,
            "publish_date"=>$request->publish_date ?? now(),
            "review_enable"=>@$request->review_enable,
            "comment_enable"=>@$request->comment_enable,
            "shipping_option"=>@$request->shipping_option,
            "payment_mode"=>@$request->payment_mode,
        );

        $ret = Product::where('id',$id)->update($data);
        // return $ret;
        if($ret){
            Session::flash('pmessage', 'Product updated Successfully'); 
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {

        $ret = Product::where('id',$id)->delete();
        if($ret){
            Session::flash('pmessage', 'Product Deleted Successfully, Product Id '.$id); 
        }
        return redirect()->back();
    }
}
