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
			  
			  
            <form action="{{ route('purchase.getpurchasereturn') }}" method="POST" enctype="multipart/form-data">
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
                    <div class='input-group date' id='datetimepicker1'>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>

                    <input type="text" name="voucher_date" class="form-control" id="voucher_date" placeholder="Invoice date">
                   
                    <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
                  </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Supplier Name">Supplier Name</label>
                   

                    <select name="supplier_name" id="supplier_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Supplier</option>
                @foreach($supplier as $sup)
                        <option value="{{$sup->id}}">{{$sup->supplier_name}}</option>
                @endforeach 
                    </select>


                  </div>

                 </div>

                 
           
                 <a class="btn btn-primary " href="{{ route('purchase.purchasereturn') }}"> Back </a>
              

                  <button type="submit" class="btn btn-primary float-right">Search</button>
            
            </form>
                

				
				
 
 
 </div></div></div>
 </section>
 
 </div>
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>
 <script>
    $(document).ready(function(){
      var date_input=$('input[name="voucher_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>



@include('common.footer')     
@endsection
