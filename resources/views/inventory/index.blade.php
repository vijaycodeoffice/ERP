@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products Inventory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <div class="pull-right float-right"> <a class="btn btn-primary btn-sm " href="{{ route('products.create') }}"><i class="fas fa-plus"></i> Add Product </a></div>
              </div>
         <div class="card-body">

         @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif 

        <form action="#" method="POST" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                  <th>Sr.no</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Category Name</th>
                    <th>Warehouse Name</th>
                    <th>Quantity Blance</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php

					$sno = 1;	
				@endphp
			@foreach ($products as $item)

  

                  <tr>
                  <td scope="col"><input class="qytbal" name="check_id" value="{{$item->id}}" type="checkbox" /></td>
                    <td>{{ $sno++ }}</td>
                    <td>{{$item->item_name}}</td>
                    <td><img src="{{ asset($item->item_attachment) }}" style=" width:100px; height:80px;"></td>
                    <td>{{ $item['category']['category_name'] }} </td>
                    <td> {{ $item['warehouse']['warehouse_name'] }}</td>
                    <td class="qtybal"> {{$item->quantity_balance}}</td>
                    <td class="project-actions text-right">

                   
                                        <div class="inputboxval">
                                       
                                        </div>

                    
                    <input type="hidden" name="id" id="id" value="{{$item->id}}" /> 

               <!--      <input type="submit" class="btn btn-info btn-sm" value="Update"> -->
			   
			     <a class="btn btn-primary btn-sm" href="{{ route('inventory.show', $item->id) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> 
                                    
                         
                         
                      </td>
                  </tr>
                 
               
                  @endforeach
                  
                  
                  
                
                  </tbody>
               <!--    <tfoot>
                  <tr>
                  
                  <th>Sr.no</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Category Name</th>
                    <th>Warehouse Name</th>
                    <th>Quantity Blance</th>
                    <th>Action</th>
                  </tr>
                  </tfoot> -->
                </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>

<!--
 <script>
$('.qtybal').click(function () {
    $(this).replaceWith(function () {
        console.log("Text is "+ $(this).text());
        return '<input type="text" name="quantity_balance" id="quantity_balance" value="' + $(this).text() + '" />';
    });
})

$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});
 </script> -->
   
  @include('common.footer')     
@endsection
