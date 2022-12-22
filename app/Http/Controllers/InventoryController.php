<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Validator;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories=Inventory::all();
        return view('inventory.index',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::all();
        $units = Unit::all();
        return view('inventory.create',compact('products','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'unit_id' => 'required|exists:units,id',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with("error", '<i class="fa fa-times ">'.$validator->errors().'</i> ');
        }
        $product = Product::find($request->product_id);
        $unit = Unit::find($request->unit_id);
        Inventory::create($request->all());
         return redirect()->back()->with("success", '<i class="fa fa-check ">Added successfuly</i> '); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
         $inventory->delete();
  
        return redirect()->route('inventories.index')
                        ->with('success','inventory deleted successfully');
    }
}
