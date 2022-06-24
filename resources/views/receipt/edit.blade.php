@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Edit</li>
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
				  
            <form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
        
         <div class="card-body">
         <div class="form-row">
           <div class="form-group col-md-4">
             <label for="Company Name">Company Name</label>
             <input type="text" value="{{$company->name}}" name="company_name" class="form-control" id="company_name" placeholder="Company Name">
          
           </div>
           <div class="form-group col-md-4">
             <label for="Company Code">Company Code</label>
             <input  type="text" value="{{$company->company_code}}" name="company_code" class="form-control" id="company_code" placeholder="Company Code" readonly>
           </div>

           <div class="form-group col-md-4">
             <label for="Company Number">Company Number</label>
             <input type="text" value="{{$company->company_number}}" name="company_number" class="form-control" id="company_number" placeholder="Company Number">
           </div>

          </div>

          
     


           <div class="form-row">

           <div class="form-group col-md-4">
             <label for="Email">Company Email</label>
             <input type="text" value="{{$company->email}}" name="email" class="form-control" id="email" placeholder="Email">
           </div>

         
           <div class="form-group col-md-4">
             <label for="Company Currency">Company Currency</label>
             <input type="text" value="{{$company->company_currency}}" name="company_currency" class="form-control" id="company_currency" placeholder="Company Currency">
           </div>

           <div class="form-group col-md-4">
             <label for="Company Country">Company Country</label>
           
             <select name="company_country" id="company_country" class="form-control">
             <option value="" selected="" disabled="" >Select Country</option>
         @foreach($country as $count)
                 <option value="{{$count->id}}" {{ $count->id == $company->company_country  ? 
                'selected' : ''}}   >{{$count->country_name}}</option>
         @endforeach 
             </select>
           
           
           </div>

         

</div>


<div class="form-row">



<div class="form-group col-md-6">
             <label for="Address"> Company Address</label>
             <textarea class="form-control" name="address" id="address" rows="3">{{$company->address}}</textarea>
            
           </div>
           

<div>

         
 </div>	</div>
 
				
				
	
				
				
                <!-- /.card-body -->

            <button type="submit" class="btn btn-primary float-right">Update</button>
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
    })
</script>



@include('common.footer')     
@endsection
