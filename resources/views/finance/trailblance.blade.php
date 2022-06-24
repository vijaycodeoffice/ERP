@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trial Blance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trial Blance</li>
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

      <form action="{{ route('finance.gettrialblance') }}" method="POST" enctype="multipart/form-data">
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

 <button type="submit" class="btn btn-primary float-right" id="get_data">Get Trail Blance</button>


</form>

</div>

<!-- <div class="m-4"> 
  
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="From Date">Company Name:</label> Agaatti
</div>

<div class="form-group col-md-6">
    <label for="From Date">Date From</label> 01-09-2021 to 30-09-2021
</div>

</div> -->


<!-- <table  class="table">

        <colgroup span="2"></colgroup>
        <col>
        <tr>
        <th rowspan="2" style="">#</th>
            <th rowspan="2" style="">Particulars</th>
       
            <th colspan="2" style="horizontal-align : middle;text-align:center; width: 50%;">Closing Balance</th>
            
        </tr>
        <tr>
        
            <th scope="col">Debit</th>
            <th scope="col">Credit</th>
        </tr>
        <tr class="table-primary">
        <td>1</td>
            <td>Current Liabilites</td>
         
            <td>-</td>
            <td>-</td>
           
           
        </tr>

        <tr class="">
        <td>2</td>
            <td>Provisions</td>
         
            <td>-</td>
            <td>-</td>
           
           
        </tr>

        <tr class="table-secondary">
        <td>3</td>
            <td>Fixed Assets</td>
            <td>-</td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>4</td>
            <td>Office Assets</td>
            <td>0</td>
            <td>0</td>
            
        </tr>


        <tr class="table-info">
        <td>5</td>
            <td>Current Assets</td>
            <td>-</td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>6</td>
            <td>Opening Stock</td>
            <td>-</td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>7</td>
            <td>Cash in-Hand</td>
          
            <td id="totalnetamount">  </td>
            <td>-</td>
            
        </tr>


        <tr class="table-success" data-depth="4">
        <td>8</td>
            <td>Sales Accounts</td>
            <td id="">-</td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>9</td>
            <td>Cash Sale</td>
            <td id="cashsaleTotal"></td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>10</td>
            <td>Credit Sale</td>
            <td id="creditsaleTotal"></td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>11</td>
            <td>Other Sale</td>
            <td id="othersaleTotal"></td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>12</td>
            <td>Sale Discount</td>
            <td >-</td>
            <td id="totaldiscount"></td>
            
        </tr>

        <tr class="">
        <td>13</td>
            <td>Sale Return</td>
            <td>-</td>
            <td>-</td>
            
        </tr>


        <tr class="table-primary">
        <td>14</td>
            <td>Purchase Accounts</td>
            <td>-</td>
            <td>-</td>
            
        </tr>

        <tr class="">
        <td>15</td>
            <td>Cash Purchase</td>
            <td>-</td>
            <td></td>
            
        </tr>

        <tr class="">
        <td>16</td>
            <td>Credit Purchase</td>
            <td>-</td>
            <td></td>
            
        </tr>

        <tr class="">
        <td>17</td>
            <td>Other Purchase</td>
            <td>-</td>
            <td></td>
            
        </tr>
      
        <tr class="">
        <td>18</td>
            <td>Purchase Discount</td>
            <td></td>
            <td>-</td>
            
        </tr>


        <tr class="">
        <td>19</td>
            <td>Purchase Return</td>
            <td>-</td>
            <td>-</td>
            
        </tr>




        <tr class="table-secondary">
        <td></td>
            <td>Grand Total</td>
            <td>200</td>
            <td>250</td>
          
         
           
        </tr>


    </table> -->






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
<!-- <button type="submit" class="btn btn-primary float-left">Print</button> -->
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
