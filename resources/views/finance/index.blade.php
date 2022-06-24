@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
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
                    <td>{{ $sno++ }}</td>
                    <td>{{$item->item_name}}</td>
                    <td><img src="{{ asset($item->item_attachment) }}" style=" width:100px; height:80px;"></td>
                    <td>{{ $item['category']['category_name'] }} </td>
                    <td> {{ $item['warehouse']['warehouse_name'] }}</td>
                    <td> {{$item->quantity_balance}}</td>
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                
               
                  @endforeach
                  
                  
                  
                
                  </tbody>
                 <!--  <tfoot>
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
              </div>
              <!-- /.card-body -->
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>
   
  @include('common.footer')     
@endsection
