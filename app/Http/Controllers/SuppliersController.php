<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suppliers.index',[
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $attributes = $this->validateSupplier();
        
        
        Supplier::create($attributes+['added_by'=>1]);

        return redirect('/suppliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Supplier $supplier,Request $request)
    {
        $supplier->update($this->validateSupplier()+['added_by'=>1]);
        
        return redirect('suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers');
    }

    protected function validateSupplier(){
        return request()->validate([
            'name' => ['required','min:3','max:50'],
            'email' => ['required','email','min:6','max:100'],
            'phone' => ['required','min:8','max:15'],
            'address' => ['required','min:10','max:100'],
            'contact_person' => ['required','min:3','max:100'],
            'is_active' => ['required']
        ]);
    }
}
