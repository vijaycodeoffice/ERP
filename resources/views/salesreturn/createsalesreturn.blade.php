@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Return</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales Return</li>
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
			  
			  
            <form action="{{ route('sales.getsalesreturn') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Invoice Numer">Invoice Number</label>
                    <input type="text" name="invoice_no" value="" class="form-control" id="invoice_no" placeholder="Invoice Number">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Voucher Date">Invoice Date</label>
                    <div class='input-group date' name='invoice_date' id='datetimepicker1'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>

                    <input type="text"  name="invoice_date" class="form-control" id="invoice_date" placeholder="Invoice date" autocomplete=off>
                   
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

                 
                 <a class="btn btn-primary " href="{{ route('sales.salesreturn') }}"> Back </a>
                 <button type="submit" class="btn btn-primary float-right">Search</button>
            
            </form>
                


                  </div>


              
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
      var date_input=$('input[name="invoice_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);


      $(function () {
        //var productList = ["Afghanistan", "Albania", "Algeria"]
        //$(".itemname").autocomplete({ source: productList });
    });

    })
</script>



@include('common.footer')     
@endsection
