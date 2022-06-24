@extends('app')

@section('content')

 @include('common.leftmenu')
 

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blance Sheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blance Sheet</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
  <div class="card">
              <div class="card-header">

      <form action="{{ route('finance.getblancesheet') }}" method="POST" enctype="multipart/form-data">
            @csrf       
              <div class="col-12">

<div class="card-body">
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="From Date">From Date</label>
    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
    <input type="text" value="" name="from_date" class="form-control" id="from_date" placeholder="From Date" autocomplete=off>
</div>
  </div>
  <div class="form-group col-md-6">
    <label for="To Date">To Date</label>
    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
    <input  type="text" vlaue="" name="to_date" class="form-control" id="to_date" placeholder="To Date" autocomplete=off >
</div>
  </div>




 </div>



 </div>
 </div>

 <button type="submit" class="btn btn-primary float-right" id="get_data">Get Trail Blance</button>


</form>

</div>

<div class="m-4"> 
  
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="From Date">Company Name:</label> Agaatti
</div>

<div class="form-group col-md-6">
    <label for="From Date">Date From</label> {{"$from_date"}} to  {{"$to_date"}}
</div>

</div>



<table  class="table">
      
@php 

$salestotal=  (bcdiv($sales[0]->cashsaleTotal,1,2)+bcdiv($sales[0]->creditsaleTotal,1,2)+bcdiv($sales[0]->othersaleTotal,1,2)) - (bcdiv($sales[0]->totaldiscount,1,2)+bcdiv($salesreturn[0]->totalsalesreturn,1,2));

$purchasetotal= (bcdiv($purchases[0]->cashpurchaseTotal,1,2)+bcdiv($purchases[0]->creditpurchaseTotal,1,2)+bcdiv($purchases[0]->otherpurchaseTotal,1,2)) - (bcdiv($purchases[0]->totaldiscountpurchase,1,2)+bcdiv($purchasereturn[0]->totalpurchasereturn,1,2));

if($purchasetotal>$salestotal){
$balance1= $purchasetotal-$salestotal; 
}else{ 
$balance1= "0";}

if($salestotal>$purchasetotal){
  $balance2= $salestotal-$purchasetotal; 
}else{ 
$balance2=  "0";
}

$grandtotal1=$salestotal+$balance1;
$grandtotal2=$purchasetotal+$balance2;

@endphp     



        <tr>
        <th rowspan="2" style="">#</th>
            <th rowspan="2" style="">Liabilities</th>
       
            <th colspan="1" style="horizontal-align : middle;text-align:center; width: 20%;">Closing Balance</th>
            
            <th rowspan="2" style="">Assets</th>
       
           <th colspan="1" style="horizontal-align : middle;text-align:center; width: 20%;">Closing Balance</th>

        </tr>
        <tr>
        
            <th scope="col">Debit</th>
           

           
            <th scope="col">Credit</th>
        </tr>


        


        <tr class="table-primary">
        <td>1</td>
            <td>Capital Account</td>
         
            <td>-</td>
           

            <td>Fixed Assets</td>
         
           
            <td>-</td>
           
           
        </tr>

        <tr class="table-secendory">
        <td>2</td>
            <td>Loan Liability</td>
         
           
            <td>-</td>

            <td>Office Assets</td>
         
         
            <td>-</td>
           
           
        </tr>



        <tr class="table-info">
        <td>3</td>
            <td>Current Liabilites</td>
         
           
            <td>{{$purchasetotal}}</td>

            <td>Current Assets</td>
         
           
            <td>{{$salestotal}}</td>
           
           
        </tr>

        <tr class="">
        <td>4</td>
            <td>Provisions</td>
         
          
            <td>-</td>

            <td>Closing Stock</td>
         
            <td>-</td>
           
           
        </tr>

        <tr>
        <td>5</td>
            <td>-</td>
          
            <td>-</td>

            <td>Cash-in-Hand</td>
            <td>-</td>
         
            
        </tr>

       
        <tr class="table-info">
        <td>6</td>
            <td>Profit & Loss A/c</td>
          
            <td>{{ $balance2 }}</td>

            <td></td>
            <td>{{ $balance1 }}</td>
         
            
        </tr>

        




        <tr class="table-secondary">
        <td></td>
            <td>Total</td>
           
            <td>{{$grandtotal2}}</td>
          
            <td>Total</td>
            
            <td>{{$grandtotal1}}</td>
         
           
        </tr>


    </table>




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
<button type="submit" class="btn btn-primary float-left">Print</button>
</div>
</div>


              </div>
        
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>

 <script type="text/javascript">
	$(document).ready(function(){
		$("#get_data9").click(function(){
			var from_date=$("#from_date").val();
			var to_date=$("#to_date").val();

     
      alert("Sure you want to show trial balance");
			$.ajax({

headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				type:"post",
				url:"{{  url('/finance/gettrailblance') }}/",
				data:{from_date:from_date,to_date:to_date},
        dataType:"json",
				success:function(data){
          $("#totalnetamount").html(parseFloat(data[0].totalnetamount).toFixed(2));
					$("#totaldiscount").html(parseFloat(data[0].totaldiscount).toFixed(2));
          $("#cashsaleTotal").html(parseFloat(data[0].cashsaleTotal).toFixed(2));
          $("#creditsaleTotal").html(parseFloat(data[0].creditsaleTotal).toFixed(2));
          $("#othersaleTotal").html(parseFloat(data[0].othersaleTotal).toFixed(2));
        
          
					console.log(data);
				}
			});
		});
	});
</script>



 <script>
    $(document).ready(function(){


      var date_input=$('input[name="from_date"]'); //our date input has the name "date"
      var date_input2=$('input[name="to_date"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      date_input2.datepicker(options);
    })
</script>
   
  @include('common.footer')     
@endsection
