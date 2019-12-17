<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleDetail;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('sales.index',[
            'sales' => Sale::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create',[
            'customers' => Customer::where('is_active','1')->get(),
            'products' => Product::where('is_active','1')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateSale();
        
        $product_number = count($request->input('detail_product_id'));
        $attributes_childs = $this->validateSaleProducts();

        if ($attributes->fails()) {
            
            return redirect('/sales/create')
                        ->withErrors($attributes)
                        ->withInput();
        }elseif($attributes_childs->fails()){
            return redirect('/sales/create')
                        ->withErrors($attributes_childs)
                        ->withInput();
        }
        $sale = Sale::create($attributes->valid()+['product_number'=>$product_number, 'added_by'=>1]);
        $sale_id = $sale->id;

        $saleDetail = array();
        for($i=0;$i<$product_number;$i++){
            $saleDetail[$i] = array(
                'quantity' => $request->input('product_quantity')[$i],
                'unit_price' => $request->input('product_unit_price')[$i],
                'total_price' => $request->input('product_total_price')[$i],
                'description' => $request->input('product_description')[$i],
                'product_id' => $request->input('detail_product_id')[$i],
                'customer_id' => $request->input('customer_id'),
                'sale_id' => $sale_id,
                'added_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        $sale = SaleDetail::insert($saleDetail);

        return redirect('/sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
    protected function validateSale(){
        return Validator::make(request()->all(), [
            'sale_no' => ['required','min:3','max:50'],
            'sale_date' => ['required'],
            'customer_id' => ['required'],
            'product_id' => ['required'],
            'amount' => ['required'],
            'paid_amount' => ['required'],
            'due_amount' => ['required']
        ]);
    }

    public function validateSaleProducts(){
        return Validator::make(request()->all(), [
            'detail_product_id' => ['required'],
            'detail_product_id.*' => ['required'],
            'product_description' => ['required'],
            'product_description.*' => ['required'],
            'product_quantity' => ['required'],
            'product_quantity.*' => ['required'],
            'product_unit_price' => ['required'],
            'product_unit_price.*' => ['required'],
            'product_total_price' => ['required'],
            'product_total_price.*' => ['required']
        ],
        [
            'detail_product_id.required' => 'The product details are is required.',
            'product_description.required' => 'The product details are is required.',
            'product_quantity.required' => 'The product details are is required.',
            'product_unit_price.required' => 'The product details are is required.',
            'product_total_price.required' => 'The product details are is required.',
            
            'detail_product_id.*.required' => 'The product is not selected.',
            'product_description.*.required' => 'The product description is required.',
            'product_quantity.*.required' => 'The product quantity is required.',
            'product_unit_price.*.required' => 'The product unit price is required.',
            'product_total_price.*.required' => 'The product total price is required.',
        ]);
    }
}
