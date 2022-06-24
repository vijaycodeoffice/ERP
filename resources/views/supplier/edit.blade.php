@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('supplier') }}">Home</a></li>
              <li class="breadcrumb-item active">Supplier Edit</li>
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
				  
            <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Supplier Name">Supplier Name</label>
                    <input type="text" value="{{ $supplier->supplier_name}}" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Supplier Code">Supplier Code</label>
                    <input  type="text" value="{{ $supplier->supplier_code}}" name="supplier_code" class="form-control" id="supplier_code" placeholder="Supplier Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number</label>
                    <input type="text"value="{{ $supplier->contact_no}}" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Tax ID">Tax ID</label>
                    <input type="text" value="{{ $supplier->tax_id}}" name="tax_id" class="form-control" id="tax_id" placeholder="Tax ID">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Refernce By">Refernce By</label>
                    <input type="text" value="{{ $supplier->refernce_by}}" name="refernce_by" class="form-control" id="refernce_by" placeholder="Refernce By">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Email">Email</label>
                    <input type="text"value="{{ $supplier->email}}" name="email" class="form-control" id="email" placeholder="Email">
                  </div>


    
                

</div>
<div class="form-row">

<div class="form-group col-md-6">
                    <label for="Address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $supplier->address}}</textarea>
                   
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
