@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Unit of Measure</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('unitofmeasure') }}">Home</a></li>
              <li class="breadcrumb-item active">Unit of Measure</li>
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
                <h3 class="card-title">Unit of Measure List</h3>
                <div class="pull-right float-right"> <a class="btn btn-primary btn-sm " href="{{ route('unitofmeasure.create') }}"><i class="fas fa-plus"></i> Add Unit of Measure </a></div>
              </div>
         <div class="card-body">

         @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Unit of Measure Name</th>
            
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
					$sno = 1;	
				@endphp
			@foreach ($unitofmeasure as $item)

                  <tr>

                  <td>{{ $sno++ }}</td>
                    <td>{{$item->unit_name}}</td>
                   
                    <td>

                    @if ($item->status == 1)
					<span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
				@else
				<span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span> 
				@endif



                    </td>
                    <td class="project-actions text-right">

                    @if ($item->status == 1)
				<a href="{{ route('unitofmeasure.inactive', $item->id) }}" class="btn btn-danger" title="inactive now">
					<i class="fa fa-arrow-down"></i></a>
			@else
			<a href="{{ route('unitofmeasure.active', $item->id) }}" class="btn btn-success" title="active now">
				<i class="fa fa-arrow-up"></i></a>
			@endif


                      
                          <a class="btn btn-info btn-sm" href="{{ route('unitofmeasure.edit', $item->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                         <!--  <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a> -->
                      </td>
                  </tr>
                
                  @endforeach
                
                  
                  
                  
                
                  </tbody>
                 <!--  <tfoot>
                  <tr>
                  <th>Sr.no</th>
                    <th>Unit of Measure Name</th>
                  
                    <th>Status</th>
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
   
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>

  @include('common.footer')     
@endsection
