@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Country |  <span> <a class="btn btn-primary " href="{{ route('country') }}"> Back </a> </span></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('country') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Country</li>
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
				  
            <form action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Country Name">Country Name</label>
                    <input type="text" name="country_name" class="form-control" id="country_name" placeholder="Country Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Country Code">Country Code</label>
                    <input  type="text" name="country_code" class="form-control" id="country_code" placeholder="Country Code">
                  </div>


                 </div>

                 

                  

                

</div>



                
				</div>	</div>
				
				
	
				
				
                <!-- /.card-body -->

            <button type="submit" class="btn btn-primary float-right">Submit</button>
            
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
