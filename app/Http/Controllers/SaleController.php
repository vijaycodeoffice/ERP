<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            
            $category = Categories::latest()->get();
            $customer = Customer::latest()->get();
            //$sales = Sales::latest()->get();
            $sales = Sales::where('sale_type', '1')->get();


           // $sales = Sales::groupBy('invoice_no')->get();

          
            return view('sales.index', compact('sales','category','customer'));
    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    
		
		
    }

    public function invoiceNumber()
    {
        $orders = Sales::all();
    
        if($orders->isEmpty())
        {
            $invoice = 'SALE0001';
            return $invoice;
        }
    
        foreach($orders as $order)
        {
            $latest = Sales::latest()->first();
    
            if($latest->id == true)
            {
                $invoice = 'SALE000'.$latest->id+1;
                return $invoice;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $invoice_number = self::invoiceNumber();
        $category = Categories::latest()->get();
        $customer = Customer::latest()->get();
        $warehouse = Warehouse::latest()->get();
        $product = Products::latest()->get();
       // $data = Products::where('price')->where('id',$request->id)->first();
        return view('sales.create',compact('customer','category','warehouse','product','invoice_number'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       
    
      
/* 
        $data = array(
            'id'      => $product_id,
            'qty'     => $quantity,
            'price'   => $sale_price,
            'category_id' => $get_product_detail[0]['category_id'],
            'category_name' => $get_product_detail[0]['category_name'],
            'name'    => $get_product_detail[0]['product_name']
        );
        $this->cart->insert($data); */


         

            
            //Sales::create($value);

            $sale_id = Sales::insertGetId([
                'invoice_no' => $request->invoice_no,
                'invoice_date' => $request->invoice_date,
                'customer_id' => $request->customer_name,
                'transaction_type' => $request->transaction_type,
                'gross_amount' => $request->gross_amount,
                'discount' => $request->discount,  
                'net_amount' => $request->net_amount, 
                'narration' => $request->narration,

                'created_at' => Carbon::now(), 
      
              ]);

              foreach ($request->addmore as $key => $value) {
  
               DB::table('salestransactions')->insert([

                'sale_id' => $sale_id,
                'item_id' => $value['item_name'],
               
                'item_quantity' => $value['item_quantity'],
                'item_price' => $value['item_price'],
                'sub_total' => $value['sub_total'],
               
                'invoice_no' => $request->invoice_no,
                'customer_id' => $request->customer_name,

                'created_at' => Carbon::now(), 

                'status' => 1
            ]); 

             


        }
        return redirect()->route('sales')->with('success','Sales Add Successfully');
     



    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sales::findOrFail($id);
      
   
    $inoiveno= $sales->invoice_no;
   // $saletrans = DB::table('salestransactions')->where('invoice_no', $inoiveno)->get();


    $saletrans = DB::table('salestransactions')
    ->join('products', 'products.id', '=', 'salestransactions.item_id')
    ->join('customers', 'customers.id', '=', 'salestransactions.customer_id')
    ->select('salestransactions.*', 'products.item_name', 'products.sku','customers.customer_name','customers.email')
    ->where('salestransactions.invoice_no', $inoiveno)->get();

     return view('sales.show',compact('sales','saletrans'));
    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function invoiceprint($id)
    {

    $sales = Sales::findOrFail($id);
    $inoiveno= $sales->invoice_no;
    $saletrans = DB::table('salestransactions')
    ->join('products', 'products.id', '=', 'salestransactions.item_id')
    ->join('customers', 'customers.id', '=', 'salestransactions.customer_id')
    ->select('salestransactions.*', 'products.item_name', 'products.sku','customers.customer_name','customers.email')
    ->where('salestransactions.invoice_no', $inoiveno)->get();

    return view('sales.invoiceprint',compact('sales','saletrans'));
    }



// genrate pdf
    public function saleinvoicepdf($id)
    {
         $sales[] = Sales::findOrFail($id);
       $inoiveno= $sales[0]->invoice_no;
       $saletrans[] = DB::table('salestransactions')
        ->join('products', 'products.id', '=', 'salestransactions.item_id')
        
        ->select('salestransactions.*', 'products.item_name', 'products.sku')
        ->where('salestransactions.invoice_no', $inoiveno)->get(); 

        //$result = array_merge($sales, $saletrans);
        $sales[]= array_push($sales,$saletrans);
       // array_push($data,$candidate);
        $pdf = PDF::loadView('sales.saleinvoicepdf', $sales);
    
        return $pdf->download('saleinvoice.pdf');
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

    //salesretutn

    public function invoiceReturnNumber()
    {
        //$orders = Sales::all();
        $orders = DB::table('salesreturns')->get();
       
    
        if($orders->isEmpty())
        {
            $invoice = 'SRETURN0001';
            return $invoice;
        }
    
        foreach($orders as $order)
        {
            //$latest = Sales::latest()->first();
            $latest = DB::table('salesreturns')->get();
    
            if($latest[0]->id == true)
            {
                $invoice = 'SRETURN000'.$latest[0]->id+1;
                return $invoice;
            }
        }
    }





public function salesreturn()
    { 
        
        $customer = Customer::latest()->get();
        //$salesreturn = Salesreturns::where('status', '1')->get();
        //$sales = Sales::latest()->get();
        $salesreturn = DB::table('salesreturns')
        ->select('*')
        ->where('status', '1')->get();
    



        return view('salesreturn.index', compact('salesreturn','customer'));


}

public function createsalesreturn()
    { 
        
      
        $category = Categories::latest()->get();
        $customer = Customer::latest()->get();
        $sales = Sales::where('sale_type', '0')->get();
        
        $product = Products::latest()->get();
        return view('salesreturn.createsalesreturn', compact('sales','category','customer','product'));


}



public function getsalesreturn(Request $request)
{
   
    $invoice_no= $request->invoice_no;
    $rinvoice_number = self::invoiceReturnNumber();
    $sales = Sales::where('invoice_no', $invoice_no)->get();
  

    $saletrans = DB::table('salestransactions')
    ->join('products', 'products.id', '=', 'salestransactions.item_id')
    
    ->select('salestransactions.*', 'products.item_name', 'products.sku')
    ->where('salestransactions.invoice_no', $invoice_no)->get();

    
    return view('salesreturn.getsalesreturn', compact('sales','saletrans','rinvoice_number')); 
}


public function storesalesreturn(Request $request)
{
   

DB::table('salesreturns')->insert([

    'sale_id' => $request->sale_id,
    'invoice_no' => $request->invoice_no,
    'return_invoice' => $request->return_invoice,
    'product_data' => $request->product_data,
    'sale_return' => $request->salesreturn,
    'narration' => $request->narration,
    'created_at' => Carbon::now(), 
    'status' => 1
]);




//$data = explode(',' ,$request->checkbox[]);


//dd($request->checkbox);

//$data=$request->checkbox;
//$data= explode(',',$request->checkbox);
//dd($data);


/* foreach($data as $value){

    $item_id= explode(',',$value)[0];
    $item_quantity= explode(',',$value)[1];
    $item_price= explode(',',$value)[2];
    $sub_total= explode(',',$value)[3];
   

dd($item_quantity);


    DB::table('salesreturns')->insert([

        'sale_id' => $request->sale_id,
        'item_id' => $item_id,
        'item_quantity' => $item_quantity,
        'item_price' => $item_price,
        'sub_total' => $sub_total,
        'narration' => $request->narration,
        'created_at' => Carbon::now(), 

        'status' => 1
    ]); 
} */


   
    return redirect()->route('sales.salesreturn')->with('success','Sales Return Successfully');
}

// for sales return View



public function salesreturnview($id)
    {

    $salesreturnview = DB::table('salesreturns') 
    ->select('salesreturns.*')
    ->where('salesreturns.id', $id)->get();


    return view('salesreturn.salesreturnview',compact('salesreturnview'));
    }





public function findprice(Request $request)
{
    $data = Products::where('price')->where('id',$request->id)->first();
    return response()->json($data);
}



}
