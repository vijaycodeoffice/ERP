@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Search</li>
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
               

                <div class="col-12">

<div class="card-body">
<div class="form-row">
  <div class="form-group col-md-3">
  
    <label for="Contact Number">Category Name</label>
    <select name="" class="form-control">
      <option>cat1</option>
      <option>cat2</option>

    </select>
   
 
  </div>
  <div class="form-group col-md-3">
  <label for="Contact Number">Subsategory Name</label>
    <select name="" class="form-control">
      <option>subcat1</option>
      <option>subcat2</option>

    </select>
  </div>


  <div class="form-group col-md-3">
    <label for="Invoice Date">Product Name</label>
    <input  type="text" name="invoice_date" class="form-control" id="invoice_date" placeholder="Product Name" >
  </div>

  <div class="form-group col-md-3">
  <label for="Invoice Date">Product Code</label>
  <input type="text" name="invoice_no" class="form-control" id="invoice_no" placeholder="Product Code">
   
  </div>

 </div>



 </div>
 </div>

 <button type="submit" class="btn btn-primary float-right">Search</button>

</form>


</div>



               
              </div>
         <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>product1 </td>
                    <td>PRO0001</td>
                    <td> 40</td>
                    <td> 100</td>
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          
                      </td>
                  </tr>
                
               
               
                
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sr.no</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>
   
  @include('common.footer')     
@endsection
