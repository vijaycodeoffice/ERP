@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Return</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Return</li>
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
                <h3 class="card-title">Sales Return List</h3>
                <div class="pull-right float-right"> <a class="btn btn-primary btn-sm " href="{{ route('purchase.createpurchasereturn') }}"><i class="fas fa-plus"></i> Add Purchase Return </a></div>
              </div>
         <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

          

                  <th>Sr.no</th>
                  <th>Invoice No</th>
                   <th>Return Invoice</th>
                    <th>Purchase Return</th>
                    <th>Narration</th>
                    <th>Return Date</th>
                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
					$sno = 1;	
				@endphp
			@foreach ($purchasereturn as $item)

                  <tr>
                  <td>{{ $sno++ }}</td>
                  <td>{{$item->invoice_no}}</td>
                  <td>{{$item->return_invoice}}</td>
                    <td>{{$item->purchase_return}}</td>
                    <td>{{$item->narration}}</td>
                    <td>{{$item->created_at}}</td>
                
                  
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('purchase.purchasereturnview', $item->id) }}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                         <!--  <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a> -->
                        
                      </td>
                  </tr>
                
               
                
                  @endforeach
                  
                  
                
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                  <th>Sr.no</th>
                  <th>Sale Return</th>
                    <th>Narration</th>
                    <th>Return Date</th>
                   
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
