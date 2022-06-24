@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('categories') }}">Home</a></li>
              <li class="breadcrumb-item active">Category Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
 

  
  
              <!-- form start -->
			  
			  

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
			
			 <div class="col-12">
         
                <div class="card-body">
                  <div class="form-group">
                    <label for="Category Name">Category Name</label>
                    <input type="text" value="{{$category->category_name}}" name="category_name" class="form-control" id="category_name" placeholder="Category Name">
                   
                    @if($errors->any())
                   {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif



                  </div>
                
            
				</div>
				
				
				
				
				
                <!-- /.card-body -->

             
                  <button type="submit" class="btn btn-primary float-right">Update</button>
              
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
@include('common.footer')     
@endsection
