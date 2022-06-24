<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Country;
use App\Models\Journal;
use Session;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journal = Journal::latest()->get();  
        return view('journal.index', compact('journal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$country = Country::latest()->where('status', '1')->get();  
        return view('journal.create');
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
            'payment_type' => 'required',
            'payment_date' => 'required'
        ]);

        $company_id = Auth::user()->id;

        Journal::insert([

            'branch_id' => $request->branch_id,
            'company_id' => $company_id,
            'division_id' => $request->division_id,
            'payment_type' => $request->payment_type,
            'payment_date' => $request->payment_date,
            'payment_mode' => $request->payment_mode,
            'payment_amount' => $request->payment_amount,
            'payment_by' => $request->payment_by,
            'payment_to' => $request->payment_to,
            'narration' => $request->narration,
            'created_at'=> now(),
            'status' => 1,
            
        ]);


     return redirect()->route('journal')->with('success','Journal Vouchers Create  Successfully');
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
    public function destroy($id)
    {
        //
    }
}
