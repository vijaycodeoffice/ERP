<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $customer = Customer::latest()->get();
            return view('customer.index', compact('customer'));
    
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
        return view('customer.create');
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
            'customer_name' => 'required',
        ]);

        Customer::insert([

            'customer_name' => $request->customer_name,
            'customer_code' => $request->customer_code,
            'contact_no' => $request->contact_no,
            'tax_id' => $request->tax_id,
            'refernce_by' => $request->refernce_by,
            'email' => $request->email,
            'address' => $request->address,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('customer')->with('success','customer add ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
    return view('customer.edit', compact('customer'));  
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
        Customer::findOrFail($id)->update([

            'customer_name' => $request->customer_name,
            //'customer_code' => $request->customer_code,
            'contact_no' => $request->contact_no,
            'tax_id' => $request->tax_id,
            'refernce_by' => $request->refernce_by,
            'email' => $request->email,
            'address' => $request->address,
             
        ]);
        //
        return redirect()->route('customer')->with('success','Customer Edit Successfully ');
    }

 ////////////Customer active /////////////////

 public function status_active($id){

    Customer::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Customer Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Customer inactive /////////////////

    public function status_inactive($id){

        Customer::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Customer Inactive Successfully',
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
