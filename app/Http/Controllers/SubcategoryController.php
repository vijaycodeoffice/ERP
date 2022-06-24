<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Categories;
use Session;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $subcategory = Subcategory::latest()->get();
            $category = Categories::latest()->get();
            return view('subcategory.index', compact('subcategory','category'));
    
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
       
        $category = Categories::latest()->get();
        return view('subcategory.create',compact('category'));
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
            'subcategory_name' => 'required',
        ]);

        Subcategory::insert([

            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
         
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('subcategory')->with('success','Sub Category add ');
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
        //
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
        //
    }

  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcategory(){

        $category = Category::latest()->get();
        return json_encode($category);
  
    }

//active and inactive

 ////////////Subcategory active /////////////////

 public function status_active($id){

    Subcategory::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Subcategory Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Subcategory inactive /////////////////

    public function status_inactive($id){

        Subcategory::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Subcategory Inactive Successfully',
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
