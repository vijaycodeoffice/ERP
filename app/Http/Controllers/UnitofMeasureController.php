<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UnitofMeasure;
use Session;

class UnitofMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $unitofmeasure = UnitofMeasure::latest()->get();
            return view('unitofmeasure.index', compact('unitofmeasure'));
    
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
        return view('unitofmeasure.create');
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
            'unit_name' => 'required',
        ]);

        UnitofMeasure::insert([

            'unit_name' => $request->unit_name,
            
         
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('unitofmeasure')->with('success','Unit of Measure add ');
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
        $unitofmeasure = UnitofMeasure::findOrFail($id);
        return view('unitofmeasure.edit', compact('unitofmeasure'));
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
        UnitofMeasure::findOrFail($id)->update([

            'unit_name' => $request->unit_name,
             
        ]);
        //
        return redirect()->route('unitofmeasure')->with('success','Unit of Measure Edit Successfully ');
    }


 ////////////UnitofMeasure active /////////////////

 public function status_active($id){

    UnitofMeasure::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'UnitofMeasure Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////UnitofMeasure inactive /////////////////

    public function status_inactive($id){

        UnitofMeasure::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'UnitofMeasure Inactive Successfully',
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
