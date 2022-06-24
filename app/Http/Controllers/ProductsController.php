<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Warehouse;
use App\Models\UnitofMeasure;
use carbon\carbon;
use Picqer\Barcode;
use Image;
use Session;


/* namespace Picqer\Barcode;

use Imagick;
use imagickdraw;
use imagickpixel;
use Picqer\Barcode\Exceptions\BarcodeException; */


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $warehouse = Warehouse::latest()->get();
            $category = Categories::latest()->get();
            $products = Products::latest()->get();
            return view('products.index', compact('products','category','warehouse'));
    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    }


    public function skuNumber()
    {
        $productid = Products::all();
    
        if($productid->isEmpty())
        {
            $skuNumber = 'SKU0001';
            return $skuNumber;
        }
    
        foreach($productid as $pro)
        {
            $latest = Products::latest()->first();
    
            if($latest->id == true)
            {
                $skuNumber = 'SKU000'.$latest->id+1;
                return $skuNumber;
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
        $sku_number = self::skuNumber();
        $warehouse = Warehouse::latest()->where('status', '1')->get();
        $category = Categories::latest()->where('status', '1')->get();
        $subcategory = Subcategory::latest()->where('status', '1')->get();
        $unitofmeasure = UnitofMeasure::latest()->where('status', '1')->get();
        return view('products.create',compact('warehouse','category','unitofmeasure','subcategory','sku_number'));
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
            'item_name' => 'required',
        ]);

        $image = $request->file('item_attachment');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('public/upload/products/thumbnail/'.$name_gen);
        $save_url = 'public/upload/products/thumbnail/'.$name_gen;

        
       
       /*  $number = $request->sku;
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($number, $generator::TYPE_CODE_128); */
       
      /*   $number = $request->sku;
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$barcode = '< img src="data:image/png;base64,' . base64_encode($generator->getBarcode($number, $generator::TYPE_CODE_128)) . '" >'; */
    


      $product_id = Products::insertGetId([
          'item_name' => $request->item_name,
          'category_name' => $request->category_name,
          'sku' => $request->sku,
          'item_barcode' => $request->item_barcode,
          'price' => $request->price,
        
          'subcategory_name' => $request->subcategory_name,
          'unit_name' => $request->unit_name,
          'initial_quantity' => $request->initial_quantity,
          'quantity_added' => $request->quantity_added,
          'warehouse_name' => $request->warehouse_name,
          'quantity_balance' => $request->quantity_balance,
          'item_attachment' => $save_url,
          'item_description' => $request->item_description,
          'narration' => $request->narration,
          'status' => 1,
         
         
          'created_at' => Carbon::now(), 

        ]);

        return redirect()->route('products')->with('success','Product add ');

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
        $products = Products::findOrFail($id);
        $warehouse = Warehouse::latest()->where('status', '1')->get();
        $category = Categories::latest()->where('status', '1')->get();
        $subcategory = Subcategory::latest()->where('status', '1')->get();
        $unitofmeasure = UnitofMeasure::latest()->where('status', '1')->get();
        return view('Products.edit', compact('products','warehouse','category','unitofmeasure','subcategory'));    
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

        $product_id = $request->id;
        $old_image = $request->old_image;
    
    
        if ($request->file('product_thambnail')) {
            
            unlink($old_image);
            $image = $request->file('item_attachment');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('public/upload/products/thumbnail/'.$name_gen);
        $save_url = 'public/upload/products/thumbnail/'.$name_gen;
    
        Products::findOrFail($product_id)->update([
    
                'item_name' => $request->item_name,
                'category_name' => $request->category_name,
                'sku' => $request->sku,
                'item_barcode' => $request->item_barcode,
                'price' => $request->price,
              
                'subcategory_name' => $request->subcategory_name,
                'unit_name' => $request->unit_name,
                'initial_quantity' => $request->initial_quantity,
                'quantity_added' => $request->quantity_added,
                'warehouse_name' => $request->warehouse_name,
                'quantity_balance' => $request->quantity_balance,
                'item_attachment' => $save_url,
                'item_description' => $request->item_description,
                'narration' => $request->narration,
                'status' => 1,
            ]);
                $notification = array(
                    'message' => 'Product updated Successfully',
                    'alert-type' => 'success'
                );
                
                return redirect()->route('products')->with($notification);
                
            }else{
                Products::findOrFail($product_id)->update([
                    'item_name' => $request->item_name,
                    'category_name' => $request->category_name,
                    'sku' => $request->sku,
                    'item_barcode' => $request->item_barcode,
                    'price' => $request->price,
                  
                    'subcategory_name' => $request->subcategory_name,
                    'unit_name' => $request->unit_name,
                    'initial_quantity' => $request->initial_quantity,
                    'quantity_added' => $request->quantity_added,
                    'warehouse_name' => $request->warehouse_name,
                    'quantity_balance' => $request->quantity_balance,
                 
                    'item_description' => $request->item_description,
                    'narration' => $request->narration,
                    'status' => 1, 
                    
                ]);
                    $notification = array(
                        'message' => 'Product updated Without Image Successfully',
                        'alert-type' => 'success'
                    );
                    
                    return redirect()->route('products')->with($notification);
    
            }


        Country::findOrFail($id)->update([

            'country_name' => $request->country_name,
            'country_code' => $request->country_code,
             
        ]);
        //
        return redirect()->route('country')->with('success','Country Edit Successfully ');


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
        $product =  Products::findOrFail($id);

        $img = $product->item_attachment;
        unlink($img);
        Products::findOrFail($id)->delete();
    
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('products')->with($notification);
     }



    
}
