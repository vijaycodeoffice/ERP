<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Country;
use Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $country = Country::latest()->get();
            return view('country.index', compact('country'));
    
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
        return view('country.create');
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
            'country_name' => 'required',
        ]);

        Country::insert([

            'country_name' => $request->country_name,
            'country_code' => $request->country_code,
         
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('country')->with('success','Country Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $country = Country::findOrFail($id);
    return view('country.show', compact('country'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $country = Country::findOrFail($id);
    return view('country.edit', compact('country'));    
   
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
        //$id = $request->id;

        //$post->update($request->all());
        Country::findOrFail($id)->update([

            'country_name' => $request->country_name,
            'country_code' => $request->country_code,
             
        ]);
        //
        return redirect()->route('country')->with('success','Country Edit Successfully ');
    }

//change status

    public function changeCountryStatus(Request $request)
    {
        $changestatus = Country::find($request->id);
        $changestatus->status = $request->status;
        $changestatus->save();
  
        return response()->json(['success'=>'status change successfully.']);
    }


//active and inactive

 ////////////country active /////////////////

 public function status_active($id){

    Country::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Country Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////country inactive /////////////////

    public function status_inactive($id){

        Country::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Country Inactive Successfully',
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
