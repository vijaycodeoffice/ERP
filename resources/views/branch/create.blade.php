@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Branch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branch</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
         $company_id = Auth::user()->name;
    
         @endphp
    @php
$chars = "0123456789";
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[mt_rand(0, strlen($chars)-1)];
    $branchcode='BRANCH'.$code;
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
				  
            <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Branch Name">Branch Name</label>
                    <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Branch Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Branch Code">Branch Code</label>
                    <input  type="text" value="{{$branchcode}}" name="branch_code" class="form-control" id="branch_code" placeholder="Branch Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Branch Number">Branch Number</label>
                    <input type="text" name="branch_number" class="form-control" id="branch_number" placeholder="Branch Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Branch Email">Branch Email</label>
                    <input type="text" name="branch_email" class="form-control" id="branch_email" placeholder="Branch Email">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Branch Company">Branch Company</label>
                    <input type="text" value="{{$company_id}}" name="branch_company" class="form-control" id="branch_company" placeholder="Branch Company" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Branch Country">Branch Country</label>
                  
                    <select name="branch_country" id="branch_country" class="form-control">
                        <option value="" selected="" disabled="" >Select Country</option>
                @foreach($country as $count)
                        <option value="{{$count->id}}">{{$count->country_name}}</option>
                @endforeach 
                    </select>
                  
                  
                  </div>


                 

               

                

</div>


<div class="form-row">
  
<div class="form-group col-md-6">
                    <label for="Branch Address"> Branch Address</label>
                    <textarea class="form-control" name="branch_address" id="branch_address" rows="3"></textarea>
                   
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
