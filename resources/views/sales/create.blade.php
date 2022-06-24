@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales Invoice</li>
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
			  
			  
            <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Invoice Numer">Invoice Number</label>
                    <input type="text" name="invoice_no" value="{{$invoice_number}}" class="form-control" id="invoice_no" placeholder="Invoice Number"readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Voucher Date">Invoice Date</label>
                    <div class='input-group date' name='invoice_date' id='datetimepicker1'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>

                    <input type="text"  name="invoice_date" class="form-control" id="invoice_date" placeholder="Invoice date" autocomplete="off">
                   
                    <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
                  </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Customer Name">Customer Name</label>

                    <select name="customer_name" id="customer_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Customer</option>
                @foreach($customer as $cust)
                        <option value="{{$cust->id}}">{{$cust->customer_name}}</option>
                @endforeach 
                    </select>

                    
                  
                  
                  
                  </div>

                 </div>

                 
                 <div class="form-row">
                  
                  <div class="form-group col-md-4">
                    <label for="Transcation Type">Sales Type</label>

                    <select class="form-control" name="transaction_type">
                    <option>Select any one</option>
                     <option value="1">Cash Sale</option>
                    <option value="2">Credit Sale</option>
                    <option value="4">Transit Sale</option>
                    <option value="3">Other Sale</option>
                     </select>

                    
                  </div>

                


                  </div>


                
<!-- Multiple Item Table-->

                  <div class="form-group">
                    <span><h3>Item Information</h3></span>


<!-- <table class="table table-bordered" id="dynamicTable">  
            <tr>
                
                <th>Item Name</th>
                
                <th>Stock inhand</th>
                <th>Item Qty</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <tr> 
              
                <td>

                <select name="addmore[0][item_name]" id="item_name" class="form-control productname">
                        <option value="" selected="" disabled="" >Select Product</option>
                @foreach($product as $prod)
                        <option value="{{$prod->id}}">{{$prod->item_name}}</option>
                @endforeach 
                    </select>
                    </td>

                <td><input disabled  type="text" name="addmore[0][stock_inhand]" placeholder="Stock inhand" class="form-control" readonly /></td>  
                <td><input type="text" name="addmore[0][item_quantity]" placeholder="Enter your Qty" class="form-control" /></td>  
                <td><input  type="text" name="addmore[0][item_price]" placeholder="Item Price" class="form-control" readonly /></td>
                <td><input  type="text" name="addmore[0][sub_total]" placeholder="Sub Total" class="form-control" /></td>   
                <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
            </tr>  
        </table>  -->


        <table class="table table-bordered table-hover" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:30%">Product</th>
                      <th style="width:10%">Stock</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-info"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                     <tr id="row_1">
                       <td>
                        <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="addmore[0][item_name]" style="width:100%;" onchange="getProductData(1)" required>
                           
                            <option value="" selected="" disabled="" >Select Product</option>
                @foreach($product as $prod)
                        <option value="{{$prod->id}}">{{$prod->item_name}}</option>
                @endforeach 
                    </select>

                        </td>
                        <td><input type="text" name="addmore[0][stock_inhand]" id="stock_1" class="form-control" readonly autocomplete="off"></td>
                        <td>
                          @php 
                          
                          
                          
                          @endphp
                          <span id="dvPassport_1"style="display:none">Out of Stock</span>
                          <input type="text" name="addmore[0][item_quantity]" id="qty_1" class="form-control" required onkeyup="getTotal(1)">


                        </td>
                        <td>
                          <input type="text" name="addmore[0][item_price]" id="rate_1" class="form-control" readonly autocomplete="off">
                          <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td>
                          <input type="text" name="addmore[0][sub_total]" id="amount_1" class="form-control" readonly autocomplete="off">
                          <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
                        </td>
                        <td><button type="button" class="btn btn-danger" onclick="removeRow('1')"><i class="fa fa-close"></i>x</button></td>
                     </tr>
                   </tbody>
                </table>

        
</div>



<div class="form-row">

<div class="form-group col-md-4">
                  <label for="exampleInputFile">Attachment</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>


<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">

<label for="Gross Amount">Gross Amount</label>
<input type="text" value="" class="form-control" id="gross_amount" name="gross_amount" readonly autocomplete="off">


</div>

</div>
<div class="form-row">
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">

<label for="Amount">Discount</label>
<input type="text" value="" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
</div>

</div>


<div class="form-row">
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4"></div>
<div class="form-group col-md-4">

<label for="Amount">Net Amount</label>
<input type="text" value=""  name="net_amount" id="net_amount" class="form-control" id="amount" placeholder="Net Amount" readonly>
</div>

</div>



                  
                  <div class="form-group">
                   
    <label for="narration">Narration</label>
    <textarea class="form-control" name="narration" id="narration" rows="3"></textarea>
                  </div>
                
				</div>
				
				
				
        <a class="btn btn-primary " href="{{ route('sales') }}"> Back </a>
                <!-- /.card-body -->
                
            <button type="submit" class="btn btn-primary float-right">Submit</button>
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script type="text/javascript">
 

 $(document).ready(function() {
   //$(".select_group").select2();
   // $("#description").wysihtml5();

  

 /*   $("#OrderMainNav").addClass('active');
   $("#createOrderSubMenu").addClass('active');
   
   var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
       'onclick="alert(\'Call your custom code here.\')">' +
       '<i class="glyphicon glyphicon-tag"></i>' +
       '</button>'; 
  */


   // Add new row in the table 
   $("#add_row").unbind('click').bind('click', function() {
     var table = $("#product_info_table");
     var count_table_tbody_tr = $("#product_info_table tbody tr").length;
     var row_id = count_table_tbody_tr + 1;

     $.ajax({
         //url: base_url + '/orders/getTableProductRow/',
         url: "{{  url('/purchase/getproduct') }}/",
         //url: "{{  url('/purchase/getproduct') }}/",
         type: 'get',
         dataType: 'json',
         success:function(response) {
           
              //console.log(reponse.x);
              var html = '<tr id="row_'+row_id+'">'+
                  '<td>'+ 
                   '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="addmore['+row_id+'][item_name]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                       '<option value="">Select Product</option>';
                       $.each(response, function(index, value) {
                         html += '<option value="'+value.id+'">'+value.item_name+'</option>';             
                       });
                       
                     html += '</select>'+
                   '</td>'+ 
                   '<td><input type="text" name="addmore['+row_id+'][stock_inhand]" id="stock_'+row_id+'" class="form-control" readonly></td>'+
                   '<td> <span id="dvPassport_'+row_id+'" style="display:none">Out of Stock</span><input type="text" name="addmore['+row_id+'][item_quantity]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                   '<td><input type="text" name="addmore['+row_id+'][item_price]" id="rate_'+row_id+'" class="form-control" readonly><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                   '<td><input type="text" name="addmore['+row_id+'][sub_total]" id="amount_'+row_id+'" class="form-control" readonly><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                   '<td><button type="button" class="btn btn-danger" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i>x</button></td>'+
                   '</tr>';

               if(count_table_tbody_tr >= 1) {
               $("#product_info_table tbody tr:last").after(html);  
             }
             else {
               $("#product_info_table tbody").html(html);
             }

             $(".product").select2();

         }
       });

     return false;
   });

 }); // /document

 function getTotal(row = null) {
   if(row) {
     var total = Number($("#rate_value_"+row).val()) * Number($("#qty_"+row).val());
     total = total.toFixed(2);
     $("#amount_"+row).val(total);
     $("#amount_value_"+row).val(total);
     
     subAmount();

   } else {
     alert('no row !! please refresh the page');
   }
 }

 // get the product information from the server
 function getProductData(row_id)
 {
   var id = $("#product_"+row_id).val();
 
   //alert(id);    
   if(id == "") {
     $("#rate_"+row_id).val("");
     $("#rate_value_"+row_id).val("");

     $("#qty_"+row_id).val("");           
     
     $("#amount_"+row_id).val("");
     $("#amount_value_"+row_id).val("");

   } else {
     $.ajax({
     
       //url: "{{ url('/purchase/getProductValueById') }}/",
       url: "{{  url('/purchase/getProductValueById') }}/"+id,
       type: 'get',
       data: {id : id},
       dataType: 'json',
       success:function(response) {
         // setting the rate value into the rate input field
         
         $("#rate_"+row_id).val(response.price);
         $("#rate_value_"+row_id).val(response.price);

           $("#qty_"+row_id).val(1);
          

         $("#qty_value_"+row_id).val(1);

         $("#stock_"+row_id).val(response.quantity_balance); 

         var total = Number(response.price) * 1;
         total = total.toFixed(2);
         $("#amount_"+row_id).val(total);
         $("#amount_value_"+row_id).val(total);


         var qtyval=$("#stock_"+row_id).val();
 
   if (qtyval == "0"){
     
    $("#qty_"+row_id).hide();

    $("#rate_"+row_id).val("");
     $("#rate_value_"+row_id).val("");

     $("#qty_"+row_id).val("");           

     $("#amount_"+row_id).val("");
     $("#amount_value_"+row_id).val("");

    
     $("#dvPassport_"+row_id).show();
   }else{
    $("#dvPassport_"+row_id).hide();
    $("#qty_"+row_id).show();
   }
         
         subAmount();
       } // /success
     }); // /ajax function to fetch the product data 
   }
 }

 // calculate the total amount of the order
 function subAmount() {
  

   var tableProductLength = $("#product_info_table tbody tr").length;
   var totalSubAmount = 0;

  

   for(x = 0; x < tableProductLength; x++) {
     var tr = $("#product_info_table tbody tr")[x];
     var count = $(tr).attr('id');
     count = count.substring(4);

     totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
   } // /for

   totalSubAmount = totalSubAmount.toFixed(2);

   // sub total
   $("#gross_amount").val(totalSubAmount);
   $("#gross_amount_value").val(totalSubAmount);

   
   
   // total amount
   var totalAmount = (Number(totalSubAmount));
   totalAmount = totalAmount.toFixed(2);
   // $("#net_amount").val(totalAmount);
   // $("#totalAmountValue").val(totalAmount);

   var discount = $("#discount").val();
   if(discount) {
     var grandTotal = Number(totalAmount) - Number(discount);
     grandTotal = grandTotal.toFixed(2);
     $("#net_amount").val(grandTotal);
     $("#net_amount_value").val(grandTotal);
   } else {
     $("#net_amount").val(totalAmount);
     $("#net_amount_value").val(totalAmount);
     
   } // /else discount 

 } // /sub total amount

 function removeRow(tr_id)
 {
   $("#product_info_table tbody tr#row_"+tr_id).remove();
   subAmount();
 }
</script>





<script>
   $(document).ready(function(){
     var date_input=$('input[name="invoice_date"]'); //our date input has the name "date"
   


     var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
     var options={
       format: 'mm/dd/yyyy',
       container: container,
       todayHighlight: true,
       autoclose: true,
       startDate: new Date(),
       
     };
     date_input.datepicker(options);
    
   })
</script>
@include('common.footer')     
@endsection
