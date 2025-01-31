<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserManagementController;
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

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

	Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/logout', [SessionsController::class, 'destroy']);

	//Perfil de usuario logueado
	Route::post('/register', [InfoUserController::class, 'store']);
	Route::get('/user-profile', [InfoUserController::class, 'view']);
	Route::post('/user-profile', [InfoUserController::class, 'update']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');


	Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
	Route::get('/user-create', [UserManagementController::class, 'viewCreate'])->name('user-create');
	Route::post('/user-create', [UserManagementController::class, 'store'])->name('user-create');
	Route::get('/user-view/{id}', [UserManagementController::class, 'view'])->name('user-view');
	Route::post('/user-view/{id}', [UserManagementController::class, 'view'])->name('user-view');
	Route::get('/user-destroy/{id}', [UserManagementController::class, 'destroy'])->name('user-destroy');
	Route::post('/upload', [ImageUploadController::class, 'upload']);

	Route::get('/roles', [RoleController::class, 'index'])->name('roles');
	Route::get('/role-destroy/{id}', [RoleController::class, 'destroy'])->name('role-destroy');
	Route::get('/role-create', [RoleController::class, 'viewCreate'])->name('role-create');
	Route::post('/role-create', [RoleController::class, 'create'])->name('role-create');
	Route::get('/role-view/{id}', [RoleController::class, 'view'])->name('role-view');
	Route::post('/role-update/{id}', [RoleController::class, 'update'])->name('role-update');


	Route::get('/permissions', [PermissionController::class, 'view'])->name('permissions');
	Route::get('/permission-destroy/{id}', [PermissionController::class, 'destroy'])->name('permission-destroy');
	Route::get('/permission-create', [PermissionController::class, 'viewCreate'])->name('permission-create');
	Route::post('/permission-create', [PermissionController::class, 'create'])->name('permission-create');
	Route::get('/permission-create-role-permission', [PermissionController::class, 'viewCreateRolePermsision'])->name('permission-create-role-permission');
	Route::post('/permission-create-role-permission', [PermissionController::class, 'createRolePermsision'])->name('permission-create-role-permission');
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
