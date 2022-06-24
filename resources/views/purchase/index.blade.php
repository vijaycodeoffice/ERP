@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                <h3 class="card-title">Purchase List</h3>
                <div class="pull-right float-right"> <a class="btn btn-primary btn-sm " href="{{ route('purchase.create') }}"><i class="fas fa-plus"></i> Add Purchase </a></div>
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
                    <th>Invoice no</th>
                    <th>Voucher Date</th>
                    <th>Net Amount</th>
                    <th>Purchase Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
					$sno = 1;	
				@endphp
			@foreach ($purchase as $item)

                  <tr>
                    <td>{{ $sno++ }}</td>
                    <td>{{$item->invoice_no}}</td>
                    <td>{{$item->invoice_date}}</td>
                    <td>{{$item->net_amount}}</td>
                    <td>
                    @if ($item->transaction_type == 1)
                    Cash Purchase
                    @elseif($item->transaction_type == 2)
			            Credit Purchase
                    @else
                   Other Purchase
		          	@endif

                </td>
                  
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('purchase.show', $item->id) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                  
                          
                      </td>
                  </tr>
                
               
                
                  @endforeach
                  
                  
                
                  </tbody>
                 <!--  <tfoot>
                  <tr>
                  <th>Sr.no</th>
                    <th>Invoice no</th>
                    <th>Voucher Date</th>
                    <th>Net Amount</th>
                    <th>Purchase Type</th>
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
