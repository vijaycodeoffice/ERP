@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profit & Loss</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profit & Loss</li>
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

              <form action="{{ route('finance.getprofitloss') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="col-12">

<div class="card-body">
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="From Date">From Date</label>
    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
    <input type="text" name="from_date" class="form-control" id="from_date" placeholder="From Date" autocomplete=off>
</div>
  </div>
  <div class="form-group col-md-6">
    <label for="To Date">To Date</label>
    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
    <input  type="text" name="to_date" class="form-control" id="to_date" placeholder="To Date" autocomplete=off>
</div>
  </div>




 </div>



 </div>
 </div>

 <button type="submit" class="btn btn-primary float-right">Get Profit & Loss</button>

</form>


</div>








              </div>
        
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>

 <script>
    $(document).ready(function(){
      var date_input=$('input[name="from_date"]'); //our date input has the name "date"
      var date_input2=$('input[name="to_date"]');
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      date_input2.datepicker(options);
    })
</script>
   
  @include('common.footer')     
@endsection
