@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Search</li>
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
                    <label for="Invoice Number">Invoice Number</label>
                    <input type="text" name="invoice_no" class="form-control" id="invoice_no" placeholder="Invoice Number">
                 
                  </div>
                  <div class="form-group col-md-3">
                    <label for="Supplier Name">Supplier Name</label>
                    <input  type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name" >
                  </div>


                  <div class="form-group col-md-3">
                    <label for="Invoice Date">Invoice Date</label>
                    <input  type="text" name="invoice_date" class="form-control" id="invoice_date" placeholder="Invoice Date" >
                  </div>

                  <div class="form-group col-md-3">
                    <label for="Contact Number">Transaction Type</label>
                    <select name="" class="form-control">
                      <option>Cash</option>
                      <option>Credit</option>

                    </select>
                   
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
                    <th>Invoice Number</th>
                    <th>Supplier Name</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>SAIL0001</td>
                    <td>cust1</td>
                    <td>10/10/2021</td>
                    <td> 400</td>
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
                    <th>Invoice Number</th>
                    <th>Supplier Name</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
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
