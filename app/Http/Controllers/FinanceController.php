<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Finance;
use App\Models\Sales;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Customer;
use App\Models\Warehouse;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use carbon\carbon;
use Image;
use Session;
use PDF;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    return view('finance.blancesheet');
    }

    public function trailblance()
    {
        return view('finance.trailblance');
    }
    
    public function profitloss()
    {
        return view('finance.profitloss');
    }


//getdata

public function gettrailblance(Request $request)
{
   
        
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 
       

        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 


          $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.gettrailblance', compact('sales','purchases','salesreturn','purchasereturn','from_date','to_date'));

        //return response()->json($data);
         

}

public function printtrailblance(Request $request)
{
   
        
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 
       

        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 


          $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.printtrailblance', compact('sales','purchases','salesreturn','purchasereturn','from_date','to_date'));

        //return response()->json($data);
         

}






public function getprofitloss(Request $request)
{
 

        
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 




       
       $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.getprofitloss', compact('sales','purchases', 'purchasereturn','salesreturn','from_date','to_date'));

    

}


public function printprofitloss(Request $request)
{
 

        
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 




       
       $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.printprofitloss', compact('sales','purchases', 'purchasereturn','salesreturn','from_date','to_date'));

    

}









//getblancesheet


public function getblancesheet(Request $request)
{
 
  
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 



       $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.getblancesheet', compact('sales','purchases', 'purchasereturn','salesreturn','from_date','to_date'));

    

}


public function printblancesheet(Request $request)
{
 
  
        $from_date =$request->from_date;
        $to_date=$request->to_date;
      
        $purchases = DB::table('purchases')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamountpurchase'),
        DB::raw('SUM(discount) AS totaldiscountpurchase'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditpurchaseTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS otherpurchaseTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        $purchasereturn = DB::table('purchasereturns')
        ->select(DB::raw('SUM(purchase_return) AS totalpurchasereturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 

        $salesreturn = DB::table('salesreturns')
        ->select(DB::raw('SUM(sale_return) AS totalsalesreturn'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date]) 
        ->get(); 



       $sales = DB::table('sales')
        ->select(DB::raw('SUM(gross_amount) AS totalnetamount'),
        DB::raw('SUM(discount) AS totaldiscount'),
        DB::raw('SUM(IF(transaction_type = "1", gross_amount, 0)) AS cashsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "2", gross_amount, 0)) AS creditsaleTotal'),
        DB::raw('SUM(IF(transaction_type = "3", gross_amount, 0)) AS othersaleTotal'))
        ->whereBetween(DB::raw("(DATE_FORMAT(`created_at`, '%d-%m-%Y'))") , [$from_date,$to_date])
       
        ->get(); 


        return view('finance.printblancesheet', compact('sales','purchases', 'purchasereturn','salesreturn','from_date','to_date'));

    

}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
