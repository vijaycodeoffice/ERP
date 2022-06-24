<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Hash;
use Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $users = User::latest()->where('status', '1')->get();  
       $users = User::latest()->get();  
        return view('company.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::latest()->where('status', '1')->get();  
        return view('company.create', compact('country'));
    
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
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::insert([

            'name' => $request->company_name,
            'company_code' => $request->company_code,
            'company_number' => $request->company_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_country' => $request->company_country,
            'company_currency' => $request->company_currency,
            'address' => $request->address,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('company')->with('success','Company add ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = User::findOrFail($id);
        $country = Country::latest()->where('status', '1')->get();  
        return view('company.edit', compact('company','country'));  
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
        User::findOrFail($id)->update([

            'name' => $request->company_name,
            'company_number' => $request->company_number,
            'company_code' => $request->company_code, 
            'email' => $request->email,
            'company_country' => $request->company_country,
            'company_currency' => $request->company_currency,
            'address' => $request->address,
          
             
        ]);
        //
        return redirect()->route('company')->with('success','Company Edit Successfully ');
    }


////////////Company active /////////////////

public function status_active($id){

    User::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Company Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Company inactive /////////////////

    public function status_inactive($id){

        User::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Company Inactive Successfully',
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
