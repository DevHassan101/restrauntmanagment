<?php

use Carbon\Carbon;
use App\Models\Table;
use App\Models\DineinOrder;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TaxController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DealController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\StaffRoleController;
use App\Http\Controllers\AssignTableToStaffController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $totaltable = Table::count();
    $availabletable = Table::where('status', true)->count();
    $bookedtable = Table::where('status', false)->count();

    // Count the saved carts
    $orders = DineinOrder::count();
    $todayOrders = DineinOrder::whereDate('created_at', Carbon::now())
        ->count();
    // $ongoingorders = Cart::session('2')->getTotalQuantity();

    $avaiabletables = Table::join('assign_table_to_staff', 'assign_table_to_staff.table_id', '=', 'tables.id')
        ->join('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
        ->join('floors', 'floors.id', '=', 'tables.floor_id')
        ->select('tables.*', 'staff.name as waiter', 'floors.name as floor')
        ->where('tables.status', true)->get();
    $bookedtables = Table::join('assign_table_to_staff', 'assign_table_to_staff.table_id', '=', 'tables.id')
        ->join('staff', 'staff.id', '=', 'assign_table_to_staff.staff_id')
        ->join('floors', 'floors.id', '=', 'tables.floor_id')
        ->select('tables.*', 'staff.name as waiter', 'floors.name as floor')
        ->where('tables.status', false)->get();
    return view('admin.pages.index', compact('totaltable', 'availabletable', 'bookedtable', 'orders', 'todayOrders', 'avaiabletables', 'bookedtables'));
});


Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('table', TableController::class);
Route::resource('staffrole', StaffRoleController::class);
Route::resource('staff', StaffController::class);
Route::resource('stafftable', AssignTableToStaffController::class);
Route::resource('floor', FloorController::class);
Route::resource('tax', TaxController::class);
Route::get('tax/changestatus/{id}/{status}', [TaxController::class, 'changeStatus']);
Route::resource('discount', DiscountController::class);
Route::resource('deal', DealController::class);
Route::get('delete/dealitem', [DealController::class, 'DeleteItem']);

// Reports
Route::get('reports', [ReportController::class, 'index']);
Route::get('report/summary', [ReportController::class, 'summary']);
Route::get('report/getsummary', [ReportController::class, 'getsummary']);
Route::get('print/summary', [ReportController::class, 'PrintSummary']);
Route::get('export/summary', [ReportController::class, 'ExportSummary']);


Route::get('report/detail', [ReportController::class, 'Detail']);
Route::get('report/getdetail', [ReportController::class, 'GetDetail']);
Route::get('print/detail', [ReportController::class, 'PrintDetail']);


// beforepos
Route::get('cashier', [PosController::class, 'Cashier']);
Route::get('select/table', [PosController::class, 'SelectTable']);
Route::post('bookedtable', [PosController::class, 'BookedTable']);
// POS
Route::get('pos/{id}', [PosController::class, 'index']);
Route::get('fetch-products', [PosController::class, 'fetchProducts']);
Route::get('fetch-dealitems', [PosController::class, 'DealItems']);
Route::post('kot/print/{id}', [PosController::class, 'KotPrint']);
Route::get('order/print/{id}', [PosController::class, 'PrintOrder']);

// Cart
Route::get('fetch-carts', [PosController::class, 'fetchCarts']);
Route::get('addtocart', [PosController::class, 'AddToCart']);
Route::get('removecart', [PosController::class, 'RemoveCart']);
Route::get('increasequantity', [PosController::class, 'IncreaseQuantity']);
Route::get('decreasequantity', [PosController::class, 'DecreaseQuantity']);
Route::get('fetch-total', [PosController::class, 'FetchTotal']);
Route::post('takeaway', [PosController::class, 'Takeaway']);
Route::post('delievery', [PosController::class, 'Delievery']);
Route::post('dinein/{id}', [PosController::class, 'DineIn']);
Route::post('booking', [PosController::class, 'Booking']);
Route::get('fetch-discount', [PosController::class, 'FetchDiscount']);




// ajax new logic
Route::get('save-session-instruction', [PosController::class, 'savesession']);
