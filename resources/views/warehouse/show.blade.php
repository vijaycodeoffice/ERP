@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Warehouse Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('warehouse') }}">Home</a></li>
              <li class="breadcrumb-item active">Warehouse Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
        
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Warehouse Name">Warehouse Name : </label> {{ $warehouse->warehouse_name}}
                  
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Warehouse Code">Warehouse Code : </label> {{ $warehouse->warehouse_code}}
                   
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number : </label> {{ $warehouse->contact_no}}
                   
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Email">Email : </label> {{ $warehouse->email}}
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Address">Address : </label> {{ $warehouse->address}}
                   
                   
                  </div>
                  

                

</div>



                
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
