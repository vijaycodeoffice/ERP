<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  
        <div class="">
         <h3 class="title"> Company Name</h3>
     
        </div>
     
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('dashboard')}}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                @php
         $name = Auth::user()->name;
       

       if($name!=''){
        echo $name;
       }else{
        
       }
         @endphp




                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
        
     
          <div class="dropdown-divider"></div>
		  <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer">Sign-out</a>
         
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="Admin Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('dashboard')}}" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!--   <li class="nav-item">
                <a href="{{ route('categories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subcategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{ route('unitofmeasure')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit of Measure</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ route('country')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('supplier')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('warehouse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warehouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('company')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
   
            </ul>
          </li>




          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sales')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sales.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sales</p>
                </a>
              </li>
             
             
   
            </ul>
          </li>
		  
<!-- Sales return-->


<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Sales Return
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('sales.createsalesreturn')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Sales Return</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sales.salesreturn')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Return view</p>
                </a>
              </li>
        
   
            </ul>
          </li>




		   <!-- Purchase -->
		  
		   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
             
        
            </ul>
          </li>


          <!-- Purchase Return -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Purchase Return
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('purchase.createpurchasereturn')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Purchase Return</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.purchasereturn')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Return view</p>
                </a>
              </li>
              
             
        
            </ul>
          </li>

		  
		  <!--Transaction -->


      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Accounts Vouchers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
        
              <li class="nav-item">
                <a href="{{ route('payment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Voucher</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ route('contra')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contra Voucher</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('receipt')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Receipt Voucher</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('journal')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Journal Voucher</p>
                </a>
              </li>

          
        
   
            </ul>
          </li>

		  
		  <!-- Inventory -->
		  
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('inventory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory Update</p>
                </a>
              </li>
             
             
        
            </ul>
          </li>


    <!-- Finance -->
		  
    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Finance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{ route('finance.trailblance')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trail Blance</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{ route('finance.blancesheet')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blance Sheet</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ route('finance.profitloss')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profit & Loss</p>
                </a>
              </li>
             
        
            </ul>
          </li>


		  
		      <!-- Supplier -->
		  
		<!--    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('supplier')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier</p>
                </a>
              </li>
             
        
            </ul>
          </li> -->

        
		  
		    <!-- Customer -->
		  
		  <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
             
        
            </ul>
          </li> -->
		  
		  <!-- Warehouse -->

  <!--     <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Warehouse
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('warehouse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warehouse view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('warehouse.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Warehouse</p>
                </a>
              </li> 
             
        
            </ul>
          </li>-->





  <!-- Search -->

<!--   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('search.productsearch')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Search</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{ route('search.salesearch')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sale Search</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('search.purchasesearch')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Search</p>
                </a>
              </li>
        
            </ul>
          </li> -->


  <!-- Reports -->

  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.salesreport')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Reports</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{ route('report.purchasereport')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Reports</p>
                </a>
              </li>

        
            </ul>
          </li>


		  
		  
		  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">