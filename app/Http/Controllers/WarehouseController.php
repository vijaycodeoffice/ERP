<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;
use Session;

class WarehouseController extends Controller
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
            return view('warehouse.index', compact('warehouse'));
    
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
        return view('warehouse.create');
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
            'warehouse_name' => 'required',
        ]);

        Warehouse::insert([

            'warehouse_name' => $request->warehouse_name,
            'warehouse_code' => $request->warehouse_code,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('warehouse')->with('success','Warehouse add ');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouse.show', compact('warehouse'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouse.edit', compact('warehouse'));
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
        Warehouse::findOrFail($id)->update([

            'warehouse_name' => $request->warehouse_name,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'address' => $request->address,
             
        ]);
        //
        return redirect()->route('warehouse')->with('success','Warehouse Edit Successfully ');
    }


 ////////////Warehouse active /////////////////

 public function status_active($id){

    Warehouse::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Warehouse Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Warehouse inactive /////////////////

    public function status_inactive($id){

        Warehouse::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Warehouse Inactive Successfully',
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
