@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Warehouse</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('warehouse') }}">Home</a></li>
              <li class="breadcrumb-item active">Warehouse</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
    $counter = 1;
for($i=0; $i<=999; $i++) {
 
 $counter++;
}
$warehousecode= 'WH'.$counter;

$chars = "0123456789";
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[mt_rand(0, strlen($chars)-1)];
    $warecode='WH-'.$code;
}



    @endphp
 
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
				  
            <form action="{{ route('warehouse.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Warehouse Name">Warehouse Name</label>
                    <input type="text" name="warehouse_name" class="form-control" id="warehouse_name" placeholder="Warehouse Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Warehouse Code">Warehouse Code</label>
                    <input  type="text" value="{{$warecode}}" name="warehouse_code" class="form-control" id="warehouse_code" placeholder="Warehouse Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Address">Contact Number</label>
                    <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                   
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
