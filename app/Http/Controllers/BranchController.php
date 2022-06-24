<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Country;
use App\Models\Branch;
use Session;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::latest()->get();  
        return view('branch.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::latest()->where('status', '1')->get();  
        return view('branch.create', compact('country'));
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
            'branch_name' => 'required',
            'branch_email' => 'required|email|unique:branches'
        ]);

        $company_id = Auth::user()->id;

        Branch::insert([

            'branch_name' => $request->branch_name,
            'company_id' => $company_id,
            'branch_code' => $request->branch_code,
            'branch_number' => $request->branch_number,
            'branch_email' => $request->branch_email,
            'branch_country' => $request->branch_country,
            'branch_address' => $request->branch_address,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('branch')->with('success','Branch add  Successfully');
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
        $branch = Branch::findOrFail($id);
        $country = Country::latest()->where('status', '1')->get();  
        return view('branch.edit', compact('branch','country'));  
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
        Branch::findOrFail($id)->update([

            'branch_name' => $request->branch_name,
            'company_id' => $request->company_id, 
            'branch_code' => $request->branch_code,
            'branch_number' => $request->branch_number,
            'branch_email' => $request->branch_email,
            'branch_country' => $request->branch_country,
            'branch_address' => $request->branch_address
          
             
        ]);
        //
        return redirect()->route('branch')->with('success','Branch Edit Successfully ');
    }

////////////Branch active /////////////////

public function status_active($id){

    Branch::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Branch Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Branch inactive /////////////////

    public function status_inactive($id){

        Branch::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Branch Inactive Successfully',
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
