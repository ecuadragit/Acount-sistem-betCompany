<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RemoveRoleFromUserController;
use App\Http\Controllers\RevokePermissionFromRoleController;
use App\Http\Controllers\RevokePermissionFromUserController;
use App\Http\Controllers\RevokePermissionsFromRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PersonController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactiondetailController;
use App\Http\Controllers\Platform\PlatformController;
use App\Http\Controllers\Utility\UtilityController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
// Route::get('/test', [ClientController::class, 'index'])->name('clients.index');
// Route::get('/testperson', [PersonController::class, 'index'])->name('persons.index');
Route::get('/store', [StoreController::class, 'index'])->name('stores.index');
Route::get('/transaction', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactiondetail', [TransactionController::class, 'index'])->name('transactionsdetail.index');
Route::get('/platform', [PlatformController::class, 'index'])->name('platforms.index');
Route::get('/utility', [UtilityController::class, 'index'])->name('utilitys.index');

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::resource('/posts', PostController::class);

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::delete('/roles/{role}/permissions/{permission}', RevokePermissionFromRoleController::class)
    ->name('roles.permissions.destroy');
Route::delete('/users/{user}/permissions/{permission}', RevokePermissionFromUserController::class)
    ->name('users.permissions.destroy');
Route::delete('/users/{user}/roles/{role}', RemoveRoleFromUserController::class)
    ->name('users.roles.destroy');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  //Route::get('/test', [ClientsController::class, 'index'])->name('clients.test');
});

/****************************************************************************************************************/
/****************************************************************************************************************/
/***************************************************************************************************************/


// Route::middleware('auth')->group(function () {
   
// });
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{cliente}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{cliente}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{cliente}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{cliente}', [ClientController::class, 'destroy'])->name('clients.destroy');


/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/


Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
Route::get('/persons/{persons}', [PersonController::class, 'show'])->name('persons.show');
Route::get('/persons/{persons}/edit', [PersonController::class, 'edit'])->name('persons.edit');
Route::put('/persons/{cliepersonsnte}', [PersonController::class, 'update'])->name('persons.update');
Route::delete('/persons/{persons}', [PersonController::class, 'destroy'])->name('persons.destroy');

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

require __DIR__ . '/auth.php';
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/