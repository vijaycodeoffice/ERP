@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('customer') }}">Home</a></li>
              <li class="breadcrumb-item active">View Customer</li>
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
				  
          
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Customer Name">Customer Name : </label> {{ $customer->customer_name}}
                   
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Customer Code">Customer Code : </label> {{ $customer->customer_code}}
                   
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number : </label> {{ $customer->contact_no}}
                  
                  </div>
                 </div>

       
                 <div class="form-row">

<div class="form-group col-md-4">
  <label for="Tax ID">Tax ID : </label> {{ $customer->tax_id}}

</div>

<div class="form-group col-md-4">
  <label for="Refernce By">Refernce By : </label> {{ $customer->refernce_by}}
  
</div>


<div class="form-group col-md-4">
  <label for="Email">Email : </label> {{ $customer->email}}

</div>



</div>         



<div class="form-row">
  
<div class="form-group col-md-6">
                    <label for="Address">Address : </label> {{ $customer->address}}
                   
                   
                  </div>
                  

<div>


</div>




                
				</div>	</div>
				
				
	
				
				
                <!-- /.card-body -->

          
            
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
    })
</script>



@include('common.footer')     
@endsection
