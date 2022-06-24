<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        
        if(Auth::check()){
        $categories = Categories::latest()->get();
        return view('categories.index', compact('categories'));

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
        return view('categories.create');
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
            'category_name' => 'required',
        ]);

        Categories::insert([

            'category_name' => $request->category_name,
            'created_at'=> now(),
            'status' => 1,
            
        ]);

//Categories::create($request->all());

     return redirect()->route('categories')->with('sucess','Category add ');


        


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
        $category = Categories::findOrFail($id);
        return view('categories.edit', compact('category'));  
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
    
        Categories::findOrFail($id)->update([
            'category_name' => $request->category_name,]);
    
            $message = array(
                'message' => 'Category Update Successfully',
                'alert-type' => 'success'
            );
           

        return redirect()->route('categories')->with($message);
    
         


    }

////////////Category active /////////////////

public function status_active($id){

    Categories::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Category Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Category inactive /////////////////

    public function status_inactive($id){

        Categories::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Category Inactive Successfully',
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
