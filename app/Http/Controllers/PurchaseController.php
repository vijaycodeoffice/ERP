<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use carbon\carbon;
use Image;
use Session;
use PDF;


class PurchaseController extends Controller
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
            $supplier = Supplier::latest()->get();
           
            $purchase = Purchase::where('purchase_type', '1')->get();

            return view('purchase.index', compact('purchase','category','supplier'));


    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    }



    public function invoiceNumber()
    {
        $orders = Purchase::all();
    
        if($orders->isEmpty())
        {
            $invoice = 'PUR0001';
            return $invoice;
        }
    
        foreach($orders as $order)
        {
            $latest = Purchase::latest()->first();
    
            if($latest->id == true)
            {
                $invoice = 'PUR000'.$latest->id+1;
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
        $supplier = Supplier::latest()->get();
        $warehouse = Warehouse::latest()->get();
        $product = Products::latest()->get();
       // $data = Products::where('price')->where('id',$request->id)->first();
        return view('purchase.create',compact('supplier','product','invoice_number'));
        
       
    }

public function getproduct()
{
    $products = Products::orderBy('id','ASC')->get();
    return json_encode($products);

    

}

public function getProductValueById($id)
{
$products = Products::findOrFail($id);
return json_encode($products);
 
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

            
            //Sales::create($value);

            $purchase_id = Purchase::insertGetId([
                'invoice_no' => $request->invoice_no,
                'invoice_date' => $request->invoice_date,
                'supplier_id' => $request->supplier_name,
                'transaction_type' => $request->purchase_type,
                'gross_amount' => $request->gross_amount,
                'discount' => $request->discount,  
                'net_amount' => $request->net_amount, 
                'narration' => $request->narration,

                'created_at' => Carbon::now(), 
      
              ]);

              foreach ($request->addmore as $key => $value) {
  
               DB::table('purchasetransactions')->insert([

                'purchase_id' => $purchase_id,
                'item_id' => $value['item_name'],
               
                'item_quantity' => $value['item_quantity'],
                'item_price' => $value['item_price'],
                'sub_total' => $value['sub_total'],
               
                'invoice_no' => $request->invoice_no,
                'supplier_id' => $request->supplier_name,

                'created_at' => Carbon::now(), 

                'status' => 1
            ]); 

             


        }
    

        return redirect()->route('purchase')->with('success','Purchase Add Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $purchase = Purchase::findOrFail($id);
         $inoiveno= $purchase->invoice_no;
      
      $purchasetrans = DB::table('purchasetransactions')
        ->join('products', 'products.id', '=', 'purchasetransactions.item_id')
        ->join('suppliers', 'suppliers.id', '=', 'purchasetransactions.supplier_id')
        ->select('purchasetransactions.*', 'products.item_name', 'products.sku','suppliers.supplier_name','suppliers.email')
        ->where('purchasetransactions.invoice_no', $inoiveno)->get();
    
    return view('purchase.show',compact('purchase','purchasetrans'));

        //
    }


    public function invoiceprint($id)
    {

    $purchase = Purchase::findOrFail($id);
    $inoiveno= $purchase->invoice_no;
    $purchasetrans = DB::table('purchasetransactions')
    ->join('products', 'products.id', '=', 'purchasetransactions.item_id')
    ->join('suppliers', 'suppliers.id', '=', 'purchasetransactions.supplier_id')
    ->select('purchasetransactions.*', 'products.item_name', 'products.sku','suppliers.supplier_name','suppliers.email')
    ->where('purchasetransactions.invoice_no', $inoiveno)->get();

    return view('purchase.invoiceprint',compact('purchase','purchasetrans'));
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


//

//salesretutn

public function invoiceReturnNumber()
{
    //$orders = Sales::all();
    $orders = DB::table('purchasereturns')->get();
   

    if($orders->isEmpty())
    {
        $invoice = 'PRETURN0001';
        return $invoice;
    }

    foreach($orders as $order)
    {
        //$latest = Sales::latest()->first();
        $latest = DB::table('purchasereturns')->get();

        if($latest[0]->id == true)
        {
            $invoice = 'PRETURN000'.$latest[0]->id+1;
            return $invoice;
        }
    }

}



public function purchasereturn()
{
    $supplier = Supplier::latest()->get();
    $purchasereturn = DB::table('purchasereturns')
    ->select('*')
    ->where('status', '1')->get();
    return view('purchasereturn.index', compact('purchasereturn','supplier'));


}

public function createpurchasereturn()
    { 

        $supplier = Supplier::latest()->get();
        $purchase = Purchase::latest()->get();
        $product = Products::latest()->get();
        return view('purchasereturn.createpurchasereturn', compact('purchase','product','supplier'));


}


public function getpurchasereturn(Request $request)
{
   
    $invoice_no= $request->invoice_no;

    $purchase = Purchase::where('invoice_no', $invoice_no)->get();
  
    $rinvoice_number = self::invoiceReturnNumber();
    $purchasetrans = DB::table('purchasetransactions')
    ->join('products', 'products.id', '=', 'purchasetransactions.item_id')
    
    ->select('purchasetransactions.*', 'products.item_name', 'products.sku')
    ->where('purchasetransactions.invoice_no', $invoice_no)->get();
    if (count($purchasetrans) > 0) 
    {
        return view('purchasereturn.getpurchasereturn', compact('purchase','purchasetrans','rinvoice_number'));  
     
    }
    else{

        return redirect()->route('purchase.createpurchasereturn')->with('success','Data Not Present');  
       
    }
}


public function storepurchasereturn(Request $request)
{
   

DB::table('purchasereturns')->insert([

    'purchase_id' => $request->purchase_id,
    'invoice_no' => $request->invoice_no,
    'return_invoice' => $request->return_invoice,
    'product_data' => $request->product_data,
    'purchase_return' => $request->purchasereturn,
    'narration' => $request->narration,
    'created_at' => Carbon::now(), 
    'status' => 1
]);



    
    return redirect()->route('purchase.purchasereturn')->with('success','Purchase Return Successfully');
}


public function purchasereturnview($id)
    {

    $purchasereturnview = DB::table('purchasereturns') 
    ->select('purchasereturns.*')
    ->where('purchasereturns.id', $id)->get();


    return view('purchasereturn.purchasereturnview',compact('purchasereturnview'));
    }




}
