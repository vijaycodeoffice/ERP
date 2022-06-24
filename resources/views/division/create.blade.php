@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Division</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Division</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
$chars = "0123456789";
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[mt_rand(0, strlen($chars)-1)];
    $divisioncode='DIVI'.$code;
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
				  
            <form action="{{ route('division.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Division Name">Division Name</label>
                    <input type="text" name="division_name" class="form-control" id="division_name" placeholder="Division Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Division Code">Division Code</label>
                    <input  type="text" value="{{$divisioncode}}" name="division_code" class="form-control" id="division_code" placeholder="Division Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Division Number">Division Number</label>
                    <input type="text" name="division_number" class="form-control" id="division_number" placeholder="Division Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Division Email">Division Email</label>
                    <input type="text" name="division_email" class="form-control" id="division_email" placeholder="Division Email">
                  </div>

                

                  <div class="form-group col-md-4">
                    <label for="Company Country">Division Country</label>
                  
                    <select name="company_country" id="company_country" class="form-control">
                        <option value="" selected="" disabled="" >Select Country</option>
                @foreach($country as $count)
                        <option value="{{$count->id}}">{{$count->country_name}}</option>
                @endforeach 
                    </select>
                  
                  
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Company Country">Division Branch</label>
                  
                    <select name="company_country" id="company_country" class="form-control">
                        <option value="" selected="" disabled="" >Select Country</option>
                @foreach($country as $count)
                        <option value="{{$count->id}}">{{$count->country_name}}</option>
                @endforeach 
                    </select>
                  
                  
                  </div>
                 

               

                

</div>


<div class="form-row">

<div class="form-group col-md-6">
                    <label for="Division Currency">Division Currency</label>
                    <input type="text" name="division_currency" class="form-control" id="division_currency" placeholder="Division Currency">
                  </div>
  
<div class="form-group col-md-6">
                    <label for="Division Address"> Division Address</label>
                    <textarea class="form-control" name="division_address" id="division_address" rows="3"></textarea>
                   
                  </div>
                  

<div>

                
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
