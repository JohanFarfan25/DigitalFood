<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('/logout', [SessionsController::class, 'destroy']);

	//Perfil de usuario logueado
	Route::post('/register', [InfoUserController::class, 'store']);
	Route::get('/user-profile', [InfoUserController::class, 'view']);
	Route::post('/user-profile', [InfoUserController::class, 'update']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	//Usuarios
	Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
	Route::get('/user-create', [UserManagementController::class, 'viewCreate'])->name('user-create');
	Route::post('/user-create', [UserManagementController::class, 'store'])->name('user-create');
	Route::get('/user-view/{id}', [UserManagementController::class, 'view'])->name('user-view');
	Route::post('/user-view/{id}', [UserManagementController::class, 'view'])->name('user-view');
	Route::get('/user-destroy/{id}', [UserManagementController::class, 'destroy'])->name('user-destroy');
	Route::post('/upload', [ImageUploadController::class, 'upload']);

	//Roles
	Route::get('/roles', [RoleController::class, 'index'])->name('roles');
	Route::get('/role-destroy/{id}', [RoleController::class, 'destroy'])->name('role-destroy');
	Route::get('/role-create', [RoleController::class, 'viewCreate'])->name('role-create');
	Route::post('/role-create', [RoleController::class, 'create'])->name('role-create');
	Route::get('/role-view/{id}', [RoleController::class, 'view'])->name('role-view');
	Route::post('/role-update/{id}', [RoleController::class, 'update'])->name('role-update');

	//Permisos
	Route::get('/permissions', [PermissionController::class, 'view'])->name('permissions');
	Route::get('/permission-destroy/{id}', [PermissionController::class, 'destroy'])->name('permission-destroy');
	Route::get('/permission-create', [PermissionController::class, 'viewCreate'])->name('permission-create');
	Route::post('/permission-create', [PermissionController::class, 'create'])->name('permission-create');
	Route::get('/permission-create-role-permission', [PermissionController::class, 'viewCreateRolePermsision'])->name('permission-create-role-permission');
	Route::post('/permission-create-role-permission', [PermissionController::class, 'createRolePermsision'])->name('permission-create-role-permission');

	//Proveedores
	Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers-index');
	Route::get('/supplier-create', [SupplierController::class, 'viewCreate'])->name('suppliers-create');
	Route::post('/supplier-create', [SupplierController::class, 'create'])->name('suppliers-create');
	Route::get('/supplier-view/{id}', [SupplierController::class, 'view'])->name('supplier-view');
	Route::post('/supplier-update/{id}', [SupplierController::class, 'update'])->name('supplier-update');
	Route::get('/supplier-destroy/{id}', [SupplierController::class, 'destroy'])->name('suppliers-destroy');

	//Customer
	Route::get('/customers', [CustomerController::class, 'index'])->name('customers-index');
	Route::get('/customer-create', [CustomerController::class, 'viewCreate'])->name('customer-create');
	Route::post('/customer-create', [CustomerController::class, 'create'])->name('customer-create');
	Route::get('/customer-view/{id}', [CustomerController::class, 'view'])->name('customer-view');
	Route::post('/customer-update/{id}', [CustomerController::class, 'update'])->name('customer-update');
	Route::get('/customer-destroy/{id}', [CustomerController::class, 'destroy'])->name('customer-destroy');

	//Almacenes
	Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses-index');
	Route::get('/warehouse-create', [WarehouseController::class, 'viewCreate'])->name('warehouse-create');
	Route::post('/warehouse-create', [WarehouseController::class, 'create'])->name('warehouse-create');
	Route::get('/warehouse-view/{id}', [WarehouseController::class, 'view'])->name('warehouse-view');
	Route::post('/warehouse-update/{id}', [WarehouseController::class, 'update'])->name('warehouse-update');
	Route::get('/warehouse-destroy/{id}', [WarehouseController::class, 'destroy'])->name('warehouse-destroy');

	//Productos
	Route::get('/products', [ProductController::class, 'index'])->name('products-index');
	Route::get('/product-create', [ProductController::class, 'viewCreate'])->name('product-create');
	Route::post('/product-create', [ProductController::class, 'create'])->name('product-create');
	Route::get('/product-view/{id}', [ProductController::class, 'view'])->name('product-view');
	Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
	Route::get('/product-destroy/{id}', [ProductController::class, 'destroy'])->name('product-destroy');

	//Lotes
	Route::get('/batches', [BatchController::class, 'index'])->name('batches-index');
	Route::get('/batch-create', [BatchController::class, 'viewCreate'])->name('batch-create');
	Route::post('/batch-create', [BatchController::class, 'create'])->name('batch-create');
	Route::get('/batch-view/{id}', [BatchController::class, 'view'])->name('batch-view');
	Route::post('/batch-update/{id}', [BatchController::class, 'update'])->name('batch-update');
	Route::get('/batch-destroy/{id}', [BatchController::class, 'destroy'])->name('batch-destroy');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
