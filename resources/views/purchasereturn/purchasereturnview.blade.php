@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Return View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Return View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
          @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif 
  
              <!-- form start -->
			  
              <form action="" method="POST" enctype="multipart/form-data">
            @csrf
          <!--   <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf -->
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Invoice Numer">Purchase Invoice Number</label>
                    <input type="text" name="invoice_no" value="{{$purchasereturnview[0]->invoice_no}}" class="form-control" id="invoice_no" readonly placeholder="Invoice Number">
                
                 
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Return Invoice Number">Purchase Return Invoice</label>
                   
                    <input type="text" value="{{$purchasereturnview[0]->return_invoice}}"  name="return_invoice" id="return_invoice" class="form-control" id="return_invoice" placeholder="Return Invoice" readonly>
                    </div>


                
                  <div class="form-group col-md-4">
                    

                  <label for="Net amount">Return Amount</label>
                    
                  <input type="text" value="{{$purchasereturnview[0]->purchase_return}}"  name="net_amount" id="ggg" class="form-control" id="amount" placeholder="Net Amount" readonly>
                  
                  
                  </div>

                 </div>

                 
       
                <!--  <button type="submit" class="btn btn-primary float-right">Search</button> -->
            
           
                


                  </div>


                
<!-- Multiple Item Table-->




                  <div class="form-group">
                    <span><h3>Item Information</h3></span>
                    <table class="table table-bordered table-hover" id="product_info_table">
                  <thead>
                    <tr>
                
                      <th style="width:30%">Product</th>
                    
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
                      <!-- <th style="width:10%"><button type="button" id="add_row" class="btn btn-info"><i class="fa fa-plus"></i></button></th> -->
                    </tr>
                  </thead>

                   <tbody>



                   @php
					$sno = 1;	
          $productdata= $purchasereturnview[0]->product_data;
          $purchasereturnview1 = explode(',', $productdata);

$valarray= array_chunk($purchasereturnview1,4);

				@endphp

        
			@foreach ($valarray as $item)
                     <tr id="row_1" class="row_1">
                           
                     

                       <td>


                       <input type="text" value="{{$item[0]}}" name="[item_name]" id="product_1" class="form-control cbComp" readonly required >

                     

                        </td>
                       
                        <td><input type="text" value="{{$item[1]}}" name="[item_quantity]" id="qty_1" class="form-control qty cbComp" readonly required ></td>
                        <td>
                          <input type="text" value="{{$item[2]}}" name="[item_price]" id="rate_1" class="form-control price cbComp" readonly autocomplete="off">
                      
                        </td>
                        <td>
                          <input type="text" value="{{$item[3]}}" name="[sub_total]" id="amount_1" class="form-control amount cbComp" readonly autocomplete="off">
                        
                        </td>
                        <!-- <td><button type="button" class="btn btn-danger" onclick="removeRow('1')"><i class="fa fa-close"></i>x</button></td> -->



                     </tr>

                     @endforeach

                   </tbody>
                </table>
</div>



<div class="form-row">




<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">

</div>

</div>
<div class="form-row">
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">

</div>

</div>


<div class="form-row">
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">


</div>

</div>






                  
                  <div class="form-group">
                   
    <label for="narration">Narration</label>
    <textarea class="form-control" name="narration" id="narration" rows="3" readonly>{{$purchasereturnview[0]->narration}}</textarea>
                  </div>
                
				</div>
				
				
        <textarea style="visibility: hidden" id="val" name="product_data"></textarea> 
				
				
                <!-- /.card-body -->
                <a class="btn btn-primary float-right" href="{{ route('purchase.purchasereturn') }}"> GO Back </a>     
           
            
              </form>
 

       

     <!--  <input type="texbox" value="" name="checkbox[]" id="val" class="form-control cbComp" >  -->
 
  
 
 </div></div></div>
 </section>
 
 </div>
   
url

@include('common.footer')     
@endsection
