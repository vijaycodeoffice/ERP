@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Return</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Return</li>
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
			  
              <form action="{{ route('purchase.storepurchasereturn') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <!--   <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf -->
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="Invoice Numer">Invoice Number</label>
                    <input type="text" name="invoice_no" value="{{$purchase[0]->invoice_no}}" class="form-control" id="invoice_no" readonly placeholder="Invoice Number">
                    <input type="hidden" value="{{$purchase[0]->id}}" name="purchase_id" id="purchase_id" class="form-control"   > 
                 
                  </div>

                  <div class="form-group col-md-3">
                    <label for="Return Invoice Number">Purchase Return</label>
                   
                    <input type="text" value="{{$rinvoice_number}}"  name="return_invoice" id="return_invoice" class="form-control" id="return_invoice" placeholder="Return Invoice" readonly>
                    </div>


                  <div class="form-group col-md-3">
                    <label for="Voucher Date">Invoice Date</label>
                    <div class='input-group date' name='invoice_date' id='datetimepicker1'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>

                    <input type="text" value="{{$purchase[0]->invoice_date}}"  name="invoice_date" class="form-control" id="invoice_date" readonly placeholder="Invoice date">
                   
                    <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
               
                  </div>
                  </div>
                  <div class="form-group col-md-3">
                    

                  <label for="Net amount">Net Amount</label>
                    
                  <input type="text" value="{{$purchase[0]->gross_amount}}"  name="net_amount" id="ggg" class="form-control" id="amount" placeholder="Net Amount" readonly>
                  
                  
                  </div>

                 </div>

                 
       
                <!--  <button type="submit" class="btn btn-primary float-right">Search</button> -->
            
           
                <input type="hidden" value="{{$purchase[0]->invoice_no}}"  name="invoice_no" id="invoice_no" class="form-control"  placeholder="Invoice no" readonly>


                  </div>


                
<!-- Multiple Item Table-->




                  <div class="form-group">
                    <span><h3>Item Information</h3></span>
                    <table class="table table-bordered table-hover" id="product_info_table">
                  <thead>
                    <tr>
                    <th style="width:5%">#</th>
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
				@endphp
			@foreach ($purchasetrans as $item)
                     <tr id="row_1" class="row_1">
                           
                     
<td><input type="checkbox" value="" name="checkbox1[]" id="chk_{{$sno++}}" class="form-control checkbox"   ></td>



                       <td>


                       <input type="text" value="{{$item->item_name}}" name="addmore[0][item_name]" id="product_1" class="form-control cbComp" readonly required >

                     

                        </td>
                       
                        <td><input type="text" value="{{$item->item_quantity}}" name="addmore[0][item_quantity]" id="qty_1" class="form-control qty cbComp" onclick="Check(event);" required ></td>
                        <td>
                          <input type="text" value="{{$item->item_price}}" name="addmore[0][item_price]" id="rate_1" class="form-control price cbComp" readonly autocomplete="off">
                          <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td>
                          <input type="text" value="{{$item->sub_total}}" name="addmore[0][sub_total]" id="amount_1" class="form-control amount cbComp" readonly autocomplete="off">
                          <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
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
<div class="form-group col-md-4">Net Amount

<input type="text" value="" name="addmore[0][total]" id="total" class="form-control total" readonly autocomplete="off">
</div>

</div>


<div class="form-row">
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">Purchase Return Amount
<input type="hidden" value="{{$purchase[0]->gross_amount}}"  name="net_amount" id="net_amount" class="form-control"  placeholder="Net Amount" readonly>
<input type="text" value="" name="purchasereturn" id="purchasereturn" class="form-control" readonly autocomplete="off">
</div>

</div>






                  
                  <div class="form-group">
                   
    <label for="narration">Narration</label>
    <textarea class="form-control" name="narration" id="narration" rows="3"></textarea>
                  </div>
                
				</div>
				
				
        <textarea style="visibility: hidden" id="val" name="product_data"></textarea> 
				
				
                <!-- /.card-body -->
                <a class="btn btn-primary " href="{{ route('purchase.purchasereturn') }}">Back </a>            
            <button type="submit" class="btn btn-primary float-right">Return</button>
            
              </form>
 

       

     <!--  <input type="texbox" value="" name="checkbox[]" id="val" class="form-control cbComp" >  -->
 
  
 
 </div></div></div>
 </section>
 
 </div>
   
<!--  <script type='text/javascript'>
 $(".qty").keyup(function(event){
    event.preventDefault();
    var checkbox = [];
    $("#product_info_table input:checkbox:checked").map(function(){
      checkbox.push($(this).val());
    });
    alert("cxvc");
    console.log(checkbox);
  });
</script> -->





 <script type='text/javascript'>//<![CDATA[

$(document).ready(function(){


  $(".qty").keyup(function(){
   
   update_amounts();
 

   $("#val").text( $( ".cbComp" ).map(function() {
    return $( this ).val();
  })
  .get().join( "," ) );



});




function update_amounts()
{
  
    var sum = 0.0;
    $('.row_1').each(function() {
     
        var qty = $(this).find('.qty').val();
        var price = $(this).find('.price').val();
        var amount = (qty*price)
        //alert(amount);
        sum+= amount;
        $(this).find('.amount').val(amount); 
    });
    var nettotal= $('.total').val(sum);
    //just update the total to sum  
    var net_amount = $('#net_amount').val(); 
    var newtotal = $('#total').val();
   
    //var salesreturn = (net_amount-newtotal); 
    //alert(salesreturn);

    var salesreturn = Number($('#net_amount').val()).toFixed(2) - Number($('#total').val()).toFixed(2);
    var finalamount = parseFloat(salesreturn).toFixed( 2 );
    $('#purchasereturn').val(finalamount);

}


});

</script>



<script type="text/javascript">
 

 $(document).ready(function() {
 


 }); // /document

 function getTotal(row = null) {
   if(row) {
     var total = Number($("#rate_value_"+row).val()) * Number($("#qty_"+row).val());
     total = total.toFixed(2);
     $("#amount_"+row).val(total);
     $("#amount_value_"+row).val(total);
     
   

   } else {
     alert('no row !! please refresh the page');
   }
 }



</script>

@include('common.footer')     
@endsection
