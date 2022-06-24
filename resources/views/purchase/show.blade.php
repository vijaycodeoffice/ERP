@extends('app')

@section('content')

 @include('common.leftmenu')
   
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note: Click the print button at the bottom for invoice</h5>
              Purchase Invoice. 
            </div>

            <!-- <form action="{{ route('purchase.purchaseinvoicepdf', $purchase->id) }}" method="get" enctype="multipart/form-data">
            @csrf -->

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Purchase Invoice.
                    <small class="float-right">Date: {{date_format($purchase->created_at,"d-m-Y")}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->

              <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>{{$purchasetrans[0]->supplier_name}}</strong><br>
          Email: {{$purchasetrans[0]->email}}
        </address>
       
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>Satguru Overseas</strong><br>
          Email: help@satguru.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice Number # {{$purchase->invoice_no}}</b><br>
     
        
      </div>
      <!-- /.col -->
    </div>



              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                    <th>SN.</th>
                     
                      <th>Item Name</th>
                      <th>Item Code</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
					$sno = 1;	
				@endphp
			@foreach ($purchasetrans as $item)
                    
                    <tr>
                    <td>{{ $sno++ }}</td>
                      
                      <td>{{$item->item_name}}</td>
                      <td>{{$item->sku}}</td>
                      <td>{{$item->item_quantity}}</td>
                      <td>{{$item->item_price}}</td>
                      <td>{{$item->sub_total}}</td>
                    </tr>
                    <tr>

                    @endforeach
                      
                     
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:
              @php 
              if($purchase->transaction_type == 1){

                echo "Cash";
              }elseif($purchase->transaction_type == 2){

                echo "Credit";
              }else{
                echo "Other";
              }
              
              @endphp    
              
              <br>
              Narration: {{$purchase->narration}}


              </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
               

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Gross Amount:</th>
                        <td>Rs {{$purchase->gross_amount}}</td>
                      </tr>
                      <tr>
                        <th>Discount</th>
                        <td>Rs {{$purchase->discount}}</td>
                      </tr>
                     
                      <tr>
                        <th>Net Amount:</th>
                        <td>Rs {{$purchase->net_amount}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <a class="btn btn-primary " href="{{ route('purchase') }}"> Back </a>
                  <a href="{{ route('purchase.invoiceprint', $purchase->id) }}" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
                  
              
                </div>
              </div>
            </div>

            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  

  @include('common.footer')     
  @endsection
  