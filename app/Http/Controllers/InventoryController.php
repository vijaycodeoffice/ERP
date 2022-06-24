<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Warehouse;
use App\Models\UnitofMeasure;
use App\Models\Inventory;
use carbon\carbon;
use Image;
use Session;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $warehouse = Warehouse::latest()->get();
            $category = Categories::latest()->get();
            $products = Products::latest()->orderBy('quantity_balance', 'desc')->get();
            return view('inventory.index', compact('products','category','warehouse'));
    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $inventory = Products::findOrFail($id);
    return view('inventory.show', compact('inventory'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$id= $request->id;

        $id= $request->check_id;
       
        Products::findOrFail($id)->update(['quantity_balance' => $request->quantity_balance]);


        //
        return redirect()->route('inventory')->with('success','Inventory Update Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
