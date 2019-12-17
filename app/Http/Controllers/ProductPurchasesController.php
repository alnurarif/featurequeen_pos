<?php

namespace App\Http\Controllers;

use App\ProductPurchase;
use App\ProductPurchaseDetail;
use App\Supplier;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductPurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('purchases.index',[
            'purchases' => ProductPurchase::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('purchases.create',[
            'suppliers' => Supplier::where('is_active','1')->get(),
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
        // dd($request);
        $attributes = $this->validatePurchase();
        
        $product_number = count($request->input('detail_product_id'));
        $attributes_childs = $this->validatePurchaseProducts();

        if ($attributes->fails()) {
            
            return redirect('/purchases/create')
                        ->withErrors($attributes)
                        ->withInput();
        }elseif($attributes_childs->fails()){
            return redirect('/purchases/create')
                        ->withErrors($attributes_childs)
                        ->withInput();
        }
        $purchase = ProductPurchase::create($attributes->valid()+['product_number'=>$product_number, 'added_by'=>1]);
        $purchase_id = $purchase->id;

        $purchaseDetail = array();
        for($i=0;$i<$product_number;$i++){
            $purchaseDetail[$i] = array(
                'quantity' => $request->input('product_quantity')[$i],
                'unit_price' => $request->input('product_unit_price')[$i],
                'total_price' => $request->input('product_total_price')[$i],
                'description' => $request->input('product_description')[$i],
                'product_id' => $request->input('detail_product_id')[$i],
                'supplier_id' => $request->input('supplier_id'),
                'purchase_id' => $purchase_id,
                'added_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        $purchase = ProductPurchaseDetail::insert($purchaseDetail);

        return redirect('/purchases');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit',[
            'purchase' => $purchase,
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
    public function update(Purchase $purchase,Request $request)
    {
        $purchase->update($this->validatePurchase()+['added_by'=>1]);
        
        return redirect('purchases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect('/purchases');
    }

    protected function validatePurchase(){
        return Validator::make(request()->all(), [
            'bill_no' => ['required','min:3','max:50'],
            'purchase_date' => ['required'],
            'supplier_id' => ['required'],
            'product_id' => ['required'],
            'amount' => ['required'],
            'paid_amount' => ['required'],
            'due_amount' => ['required']
        ]);
    }
    public function validatePurchaseProducts(){
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
    public function getPurchaseProductDetails(Request $request){
        $purchase_order = ProductPurchase::with(['user_added','supplier','product_purchase_details','product_purchase_details.product'])->find($request->input('purchase_id'));
        // $purchase_order = ProductPurchase::with('product_purchase_details')->find($request->input('purchase_id'));
        // $purchase_order->products = $purchase_order->product_purchase_details();
        return $purchase_order;
    }
}
