<?php



use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ItemStockController;
use App\Http\Controllers\ItemRecordController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ItemcategoryController;
use App\Http\Livewire\ItemRecords;
use App\Models\ItemRecord;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;

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
  return view('auth/login');
});

// Route::get('/userlist', function () {
//     return view('main.userlist');
// });


Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  // Route::get('/dashboard', function () {
  //     return view('main.dashboard');
  // })->name('dashboard');

  Route::resource('users', UserController::class);
  Route::resource('roles', RoleController::class);
  Route::resource('permissions', PermissionController::class);
  Route::resource('departments', DepartmentController::class);
  Route::resource('locations', LocationController::class);
  Route::resource('itemcategories', ItemcategoryController::class);
  Route::resource('suppliers', SupplierController::class);
  Route::resource('items', ItemController::class);
  Route::resource('people', PersonController::class);
  Route::resource('/profile/', UpdateProfileInformationForm::class);

  // Route::resource('it_records', ItRecordController::class)->only(['index', 'create', 'store']);
  Route::resource('item_stocks', ItemStockController::class)->only(['index', 'create', 'store']);

  Route::get('/items/related-items/{departmentId}', [ItemController::class, 'getRelatedItems'])->name('items.relatedItems');





  //livewire routes
  Route::get('/item_records', function () {
    return view('livewire.item-records');
  })->name('livewire.item-records');




  // Route::get('/test', function (Request $request) {

  //    $item = Item::find(1);
  //    return $item->itemcategory->name;

  // });



});
