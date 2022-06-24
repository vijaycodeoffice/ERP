@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Country Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('country') }}">Home</a></li>
              <li class="breadcrumb-item active">View Country</li>
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
                    <label for="Country Name">Country Name</label>: {{ $country->country_name}}
                   
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Country Code">Country Code</label>: {{ $country->country_code}}
                   
                  </div>


                 </div>

                 

                  

                

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
