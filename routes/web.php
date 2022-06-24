<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UnitofMeasureController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContraController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\JournalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect(route('login'));
});


/*-----------------------------company-------------------------------------*/
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('/company/store',[CompanyController::class,'store'])->name('company.store');
Route::get('/company/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
Route::post('/company/update/{id}',[CompanyController::class,'update'])->name('company.update');
Route::get('/company/status_active{id}',[CompanyController::class,'status_active'])->name('company.active');
Route::get('/company/status_inactive{id}',[CompanyController::class,'status_inactive'])->name('company.inactive');


/*-----------------------------branch-------------------------------------*/
Route::get('/branch', [BranchController::class, 'index'])->name('branch');
Route::get('/branch/create',[BranchController::class,'create'])->name('branch.create');
Route::post('/branch/store',[BranchController::class,'store'])->name('branch.store');
Route::get('/branch/edit/{id}',[BranchController::class,'edit'])->name('branch.edit');
Route::post('/branch/update/{id}',[BranchController::class,'update'])->name('branch.update');
Route::get('/branch/status_active{id}',[BranchController::class,'status_active'])->name('branch.active');
Route::get('/branch/status_inactive{id}',[BranchController::class,'status_inactive'])->name('branch.inactive');


/*-----------------------------division-------------------------------------*/
Route::get('/division', [DivisionController::class, 'index'])->name('division');
Route::get('/division/create',[DivisionController::class,'create'])->name('division.create');
Route::post('/division/store',[DivisionController::class,'store'])->name('division.store');
Route::get('/division/edit/{id}',[DivisionController::class,'edit'])->name('division.edit');
Route::post('/division/update/{id}',[DivisionController::class,'update'])->name('division.update');
Route::get('/division/status_active{id}',[DivisionController::class,'status_active'])->name('division.active');
Route::get('/division/status_inactive{id}',[DivisionController::class,'status_inactive'])->name('division.inactive');



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'customSignup'])->name('user.registration');


Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*-----------------------------Category-------------------------------------*/
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('/categories/show/{id}',[CategoriesController::class,'show'])->name('categories.show');

Route::get('/categories/status_active{id}',[CategoriesController::class,'status_active'])->name('categories.active');
Route::get('/categories/status_inactive{id}',[CategoriesController::class,'status_inactive'])->name('categories.inactive');

/*-----------------------------subCategory-------------------------------------*/
Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory');
Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');
Route::get('/subcategory/status_active{id}',[SubcategoryController::class,'status_active'])->name('subcategory.active');
Route::get('/subcategory/status_inactive{id}',[SubcategoryController::class,'status_inactive'])->name('subcategory.inactive');

/*-----------------------------Country-------------------------------------*/
Route::get('/country', [CountryController::class, 'index'])->name('country');
Route::get('/country/create',[CountryController::class,'create'])->name('country.create');
Route::post('/country/store',[CountryController::class,'store'])->name('country.store');
Route::get('/country/edit/{id}',[CountryController::class,'edit'])->name('country.edit');
Route::post('/country/update/{id}',[CountryController::class,'update'])->name('country.update');
Route::get('/country/show/{id}',[CountryController::class,'show'])->name('country.show');

Route::get('/country/status_active{id}',[CountryController::class,'status_active'])->name('country.active');
Route::get('/country/status_inactive{id}',[CountryController::class,'status_inactive'])->name('country.inactive');



/*-----------------------------unit of measure-------------------------------------*/
Route::get('/unitofmeasure', [UnitofMeasureController::class, 'index'])->name('unitofmeasure');
Route::get('/unitofmeasure/create',[UnitofMeasureController::class,'create'])->name('unitofmeasure.create');
Route::post('/unitofmeasure/store',[UnitofMeasureController::class,'store'])->name('unitofmeasure.store');
Route::get('/unitofmeasure/edit/{id}',[UnitofMeasureController::class,'edit'])->name('unitofmeasure.edit');
Route::post('/unitofmeasure/update/{id}',[UnitofMeasureController::class,'update'])->name('unitofmeasure.update');

Route::get('/unitofmeasure/status_active{id}',[UnitofMeasureController::class,'status_active'])->name('unitofmeasure.active');
Route::get('/unitofmeasure/status_inactive{id}',[UnitofMeasureController::class,'status_inactive'])->name('unitofmeasure.inactive');

/*-----------------------------Sales-------------------------------------*/

Route::get('/sales', [SaleController::class, 'index'])->name('sales');
Route::get('/sales/create',[SaleController::class,'create'])->name('sales.create');
Route::post('/sales/store',[SaleController::class,'store'])->name('sales.store');
Route::get('/sales/show/{id}',[SaleController::class,'show'])->name('sales.show');
Route::get('/sales/invoiceprint/{id}',[SaleController::class,'invoiceprint'])->name('sales.invoiceprint');


Route::get('/sales/saleinvoicepdf/{id}', [SaleController::class, 'saleinvoicepdf'])->name('sales.saleinvoicepdf');

/*-----------------------------Sales Return-------------------------------------*/
Route::get('/sales/salesreturn', [SaleController::class, 'salesreturn'])->name('sales.salesreturn');
Route::get('/sales/createsalesreturn', [SaleController::class, 'createsalesreturn'])->name('sales.createsalesreturn');

Route::post('/sales/getsalesreturn', [SaleController::class, 'getsalesreturn'])->name('sales.getsalesreturn');

Route::post('/sales/storesalesreturn', [SaleController::class, 'storesalesreturn'])->name('sales.storesalesreturn');

Route::get('/sales/salesreturnview/{id}',[SaleController::class,'salesreturnview'])->name('sales.salesreturnview');

/*-----------------------------Purchase-------------------------------------*/

Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
Route::get('/purchase/create',[PurchaseController::class,'create'])->name('purchase.create');
Route::post('/purchase/store',[PurchaseController::class,'store'])->name('purchase.store');
Route::get('/purchase/show/{id}',[PurchaseController::class,'show'])->name('purchase.show');


Route::get('/purchase/purchaseinvoicepdf/{id}', [PurchaseController::class, 'purchaseinvoicepdf'])->name('purchase.purchaseinvoicepdf');
Route::get('/purchase/invoiceprint/{id}',[PurchaseController::class,'invoiceprint'])->name('purchase.invoiceprint');



Route::get('/purchase/getproduct',[PurchaseController::class,'getproduct']);
Route::get('/purchase/getProductValueById/{id}',[PurchaseController::class,'getProductValueById']);

/*-----------------------------Purchase Return-------------------------------------*/
Route::get('/purchase/purchasereturn', [PurchaseController::class, 'purchasereturn'])->name('purchase.purchasereturn');
Route::get('/purchase/createpurchasereturn', [PurchaseController::class, 'createpurchasereturn'])->name('purchase.createpurchasereturn');

Route::post('/purchase/getpurchasereturn', [PurchaseController::class, 'getpurchasereturn'])->name('purchase.getpurchasereturn');

Route::post('/purchase/storepurchasereturn', [PurchaseController::class, 'storepurchasereturn'])->name('purchase.storepurchasereturn');

Route::get('/purchase/purchasereturnview/{id}',[PurchaseController::class,'purchasereturnview'])->name('purchase.purchasereturnview');


/*-----------------------------Products-------------------------------------*/
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductsController::class,'store'])->name('products.store');
Route::get('/products/destroy{id}',[ProductsController::class,'destroy'])->name('products.destroy');

Route::get('/products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');
Route::post('/products/update/{id}',[ProductsController::class,'update'])->name('products.update');


/*-----------------------------Supplier-------------------------------------*/
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
Route::post('/supplier/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
Route::get('/supplier/show/{id}',[SupplierController::class,'show'])->name('supplier.show');

Route::get('/supplier/status_active{id}',[SupplierController::class,'status_active'])->name('supplier.active');
Route::get('/supplier/status_inactive{id}',[SupplierController::class,'status_inactive'])->name('supplier.inactive');


/*-----------------------------Customer-------------------------------------*/
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/show/{id}',[CustomerController::class,'show'])->name('customer.show');

Route::get('/customer/status_active{id}',[CustomerController::class,'status_active'])->name('customer.active');
Route::get('/customer/status_inactive{id}',[CustomerController::class,'status_inactive'])->name('customer.inactive');


/*-----------------------------warehouse-------------------------------------*/
Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse');
Route::get('/warehouse/create',[WarehouseController::class,'create'])->name('warehouse.create');
Route::post('/warehouse/store',[WarehouseController::class,'store'])->name('warehouse.store');
Route::get('/warehouse/edit/{id}',[WarehouseController::class,'edit'])->name('warehouse.edit');
Route::post('/warehouse/update/{id}',[WarehouseController::class,'update'])->name('warehouse.update');
Route::get('/warehouse/show/{id}',[WarehouseController::class,'show'])->name('warehouse.show');

Route::get('/warehouse/status_active{id}',[WarehouseController::class,'status_active'])->name('warehouse.active');
Route::get('/warehouse/status_inactive{id}',[WarehouseController::class,'status_inactive'])->name('warehouse.inactive');


/*-----------------------------Search-------------------------------------*/
Route::get('/search/productsearch', [SearchController::class, 'productsearch'])->name('search.productsearch');
Route::get('/search/salesearch', [SearchController::class, 'salesearch'])->name('search.salesearch');
Route::get('/search/purchasesearch', [SearchController::class, 'purchasesearch'])->name('search.purchasesearch');

/*-----------------------------Reports-------------------------------------*/
Route::get('/report/salesreport', [ReportController::class, 'salesreport'])->name('report.salesreport');
Route::get('/report/purchasereport', [ReportController::class, 'purchasereport'])->name('report.purchasereport');

/*-----------------------------Inventory-------------------------------------*/

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

Route::post('/inventory/update',[InventoryController::class,'update'])->name('inventory.update');
Route::get('/inventory/show/{id}',[InventoryController::class,'show'])->name('inventory.show');

/*-----------------------------Finance-------------------------------------*/

Route::get('/finance/blancesheet', [FinanceController::class, 'index'])->name('finance.blancesheet');
Route::get('/finance/trailblance', [FinanceController::class, 'trailblance'])->name('finance.trailblance');
Route::get('/finance/profitloss', [FinanceController::class, 'profitloss'])->name('finance.profitloss');

Route::post('/finance/gettrailblance', [FinanceController::class, 'gettrailblance'])->name('finance.gettrialblance');
Route::post('/finance/getprofitloss', [FinanceController::class, 'getprofitloss'])->name('finance.getprofitloss');
Route::post('/finance/getblancesheet', [FinanceController::class, 'getblancesheet'])->name('finance.getblancesheet');


Route::get('/finance/printtrailblance', [FinanceController::class, 'printtrailblance'])->name('finance.printtrialblance');
Route::get('/finance/printprofitloss', [FinanceController::class, 'printgetprofitloss'])->name('finance.printprofitloss');
Route::get('/finance/printblancesheet', [FinanceController::class, 'printblancesheet'])->name('finance.printblancesheet');




/*-----------------------------Payment-------------------------------------*/
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/payment/create',[PaymentController::class,'create'])->name('payment.create');
Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');
Route::get('/payment/edit/{id}',[PaymentController::class,'edit'])->name('payment.edit');
Route::post('/payment/update/{id}',[PaymentController::class,'update'])->name('payment.update');
Route::get('/payment/status_active{id}',[PaymentController::class,'status_active'])->name('payment.active');
Route::get('/payment/status_inactive{id}',[PaymentController::class,'status_inactive'])->name('payment.inactive');


/*-----------------------------Contra-------------------------------------*/
Route::get('/contra', [ContraController::class, 'index'])->name('contra');
Route::get('/contra/create',[ContraController::class,'create'])->name('contra.create');
Route::post('/contra/store',[ContraController::class,'store'])->name('contra.store');
Route::get('/contra/edit/{id}',[ContraController::class,'edit'])->name('contra.edit');
Route::post('/contra/update/{id}',[ContraController::class,'update'])->name('contra.update');
Route::get('/contra/status_active{id}',[ContraController::class,'status_active'])->name('contra.active');
Route::get('/contra/status_inactive{id}',[ContraController::class,'status_inactive'])->name('contra.inactive');


/*-----------------------------Receipt-------------------------------------*/
Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt');
Route::get('/receipt/create',[ReceiptController::class,'create'])->name('receipt.create');
Route::post('/receipt/store',[ReceiptController::class,'store'])->name('receipt.store');
Route::get('/receipt/edit/{id}',[ReceiptController::class,'edit'])->name('receipt.edit');
Route::post('/receipt/update/{id}',[ReceiptController::class,'update'])->name('receipt.update');
Route::get('/receipt/status_active{id}',[ReceiptController::class,'status_active'])->name('receipt.active');
Route::get('/receipt/status_inactive{id}',[ReceiptController::class,'status_inactive'])->name('receipt.inactive');


/*-----------------------------Journal-------------------------------------*/
Route::get('/journal', [JournalController::class, 'index'])->name('journal');
Route::get('/journal/create',[JournalController::class,'create'])->name('journal.create');
Route::post('/journal/store',[JournalController::class,'store'])->name('journal.store');
Route::get('/journal/edit/{id}',[JournalController::class,'edit'])->name('journal.edit');
Route::post('/journal/update/{id}',[JournalController::class,'update'])->name('journal.update');
Route::get('/journal/status_active{id}',[JournalController::class,'status_active'])->name('journal.active');
Route::get('/journal/status_inactive{id}',[JournalController::class,'status_inactive'])->name('journal.inactive');





/*------------------------------End-----------------------------------*/