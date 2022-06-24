@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profit & Loss</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profit & Loss</li>
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

              <form action="" method="POST" enctype="multipart/form-data">
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
    <input type="text" name="from_date" class="form-control" id="from_date" placeholder="From Date" autocomplete=off>
</div>
  </div>
  <div class="form-group col-md-6">
    <label for="To Date">To Date</label>
    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
    <input  type="text" name="to_date" class="form-control" id="to_date" placeholder="To Date" autocomplete=off>
</div>
  </div>




 </div>



 </div>
 </div>

 <button type="submit" class="btn btn-primary float-right">Get Profit & Loss</button>

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
            <th rowspan="2" style="">Particulars</th>
       
          
            
            <th rowspan="2" style="">Debit</th>
       
       

        </tr>
        <tr>
        
            <th scope="col">Particulars</th>
           

           
            <th scope="col">Credit</th>
        </tr>


        


        <tr class="table-primary">
        <td>1</td>
            <td>Opening Stock</td>
         
          
            <td>-</td>

            <td>Sales Accounts</td>
         
         
            <td>-</td>
           
           
        </tr>

        <tr class="">
        <td>2</td>
            <td>-</td>
         
           
            <td>-</td>

            <td>Cash Sale</td>
         
           
            <td>{{ bcdiv($sales[0]->cashsaleTotal,1,2) }}</td>
           
           
        </tr>


        <tr class="">
        <td>2</td>
            <td>-</td>
         
            <td>-</td>
           

            <td>Credit Sale</td>
         
            
            <td>{{ bcdiv($sales[0]->creditsaleTotal,1,2) }}</td>
           
           
        </tr>


        <tr class="">
        <td>2</td>
            <td>-</td>
         
            <td>-</td>
        

            <td>Other Sale</td>
         
           
            <td>{{ bcdiv($sales[0]->othersaleTotal,1,2) }}</td>
           
           
        </tr>

        <tr class="">
        <td>3</td>
            <td>-</td>
         
            <td>-</td>
            

            <td>Sale Discount</td>
         
            
            <td>- {{ bcdiv($sales[0]->totaldiscount,1,2) }}</td>
           
           
        </tr>



        <tr class="">
        <td>4</td>
            <td>-</td>
         
            <td>-</td>
        

            <td>Sale Return</td>
         
           
            <td>- {{ bcdiv($salesreturn[0]->totalsalesreturn,1,2) }}</td>
           
           
        </tr>



        <tr class="">
        <td>5</td>
            <td>-</td>
         
            <td>-</td>
        

            <td><b>Balance B/F</b></td>
         
           
            <td><b>{{ $balance1 }}</b></td>
           
           
        </tr>

        <tr class="">
        <td>6</td>
            <td>-</td>
         
            <td>-</td>
        

            <td><b>Total</b></td>
         
           
            <td><b>{{ $salestotal }}</b></td>
           
           
        </tr>



        <tr class="table-info">
        <td>7</td>
            <td>Purchase Accounts</td>
         
            <td>-</td>
         

            <td>Closing Stock</td>
         
           
            <td></td>
           
           
        </tr>

        <tr class="">
        <td>8</td>
            <td>Cash Purchase</td>
         
            <td>{{ bcdiv($purchases[0]->cashpurchaseTotal,1,2) }}</td>
          

            <td></td>
         
            <td></td>
       
           
        </tr>


        <tr class="">
        <td>9</td>
            <td>Credit Purchase</td>
         
            <td>{{ bcdiv($purchases[0]->creditpurchaseTotal,1,2) }}</td>
            <td>-</td>

        
         
            <td></td>
          
           
        </tr>

        <tr class="">
        <td>10</td>
            <td>Other Purchase</td>
         
            <td>{{ bcdiv($purchases[0]->otherpurchaseTotal,1,2) }}</td>
            <td>-</td>

       
         
            <td></td>
          
           
        </tr>

        <tr class="">
        <td>11</td>
            <td>Purchase Discount</td>
         
            <td>- {{ bcdiv($purchases[0]->totaldiscountpurchase,1,2) }}</td>
            <td></td>

         
         
            <td>-</td>
         
           
        </tr>


        <tr class="">
        <td>12</td>
            <td>Purchase Return</td>
         
            <td>- {{ bcdiv($purchasereturn[0]->totalpurchasereturn,1,2) }}</td>
            <td></td>

           
         
            <td>-</td>
        
           
        </tr>


        <tr class="">
        <td>13</td>
            <td><b>Balance C/O</b></td>
         
            <td><b>{{ $balance2 }}</b></td>
            <td></td>

          
            <td>-</td>
        
           
        </tr>

        <tr class="">
        <td>14</td>
            <td><b>Total</b></td>
         
            <td><b>{{ $purchasetotal }}</b></td>
            <td></td>

           
         
            <td>-</td>
        

        </tr>




       <!--  <tr class="table-info">
        <td>11</td>
            <td>Net Profit</td>
            
            <td>-</td>

            <td></td>
            <td>-</td>
    
            
        </tr> -->

       


     

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
