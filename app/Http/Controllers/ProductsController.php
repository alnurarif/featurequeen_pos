<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('products.index',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('products.create',[
            'brands' => Brand::where('is_active','1')->get(),
            'categories' => Category::where('is_active','1')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $attributes = $this->validateProduct();
        
        
        Product::create($attributes+['added_by'=>1]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',[
            'product' => $product,
            'brands' => Brand::where('is_active','1')->get(),
            'categories' => Category::where('is_active','1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request)
    {
        $product->update($this->validateProduct()+['added_by'=>1]);
        
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    protected function validateProduct(){
        return request()->validate([
            'name' => ['required','min:3','max:50'],
            'color' => ['max:15'],
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'is_active' => ['required']
        ]);
    }
}
