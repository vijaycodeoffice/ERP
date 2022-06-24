<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $supplier = Supplier::latest()->get();
            return view('supplier.index', compact('supplier'));
    
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
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required',
        ]);

        Supplier::insert([

            'supplier_name' => $request->supplier_name,
            'supplier_code' => $request->supplier_code,
            'contact_no' => $request->contact_no,
            'tax_id' => $request->tax_id,
            'refernce_by' => $request->refernce_by,
            'email' => $request->email,
            'address' => $request->address,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('supplier')->with('success','Supplier add ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Supplier::findOrFail($id)->update([

            'supplier_name' => $request->supplier_name,
            'contact_no' => $request->contact_no,
            'tax_id' => $request->tax_id,
            'refernce_by' => $request->refernce_by,
            'email' => $request->email,
            'address' => $request->address,
             
        ]);
        //
        return redirect()->route('supplier')->with('success','Supplier Edit Successfully ');
    }


 ////////////Supplier active /////////////////

 public function status_active($id){

    Supplier::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Supplier Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Supplier inactive /////////////////

    public function status_inactive($id){

        Supplier::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Supplier Inactive Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


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
