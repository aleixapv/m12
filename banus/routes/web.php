<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEndController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProjectesController;
use App\Http\Controllers\ServeisController;
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
//principal
Route::get('/', [frontEndController::class, 'index'])->name('f.index');
Route::get('/admin', [BackEndController::class, 'index'])->name('b.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//categories
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

//projectes
Route::get('/admin/projectes', [ProjectesController::class, 'index'])->name('projectes.index');
Route::get('/admin/projectes/create', [ProjectesController::class, 'create'])->name('projectes.create');
Route::post('/admin/projectes/store', [ProjectesController::class, 'store'])->name('projectes.store');
Route::get('/admin/projectes/edit/{id}', [ProjectesController::class, 'edit'])->name('projectes.edit');
Route::get('/admin/projectes/show/{id}', [ProjectesController::class, 'show'])->name('projectes.show');
Route::put('/admin/projectes/update/{id}', [ProjectesController::class, 'update'])->name('projectes.update');
Route::delete('/admin/projectes/destroy/{id}', [ProjectesController::class, 'destroy'])->name('projectes.destroy');
Route::delete('/admin/projectes/edit/destroy/imatge', [ProjectesController::class, 'destroyImatge'])->name('projectes.imatge.destroy');

//serveis
Route::get('/admin/serveis', [ServeisController::class, 'index'])->name('serveis.index');
Route::get('/admin/serveis/create', [ServeisController::class, 'create'])->name('serveis.create');
Route::post('/admin/serveis/store', [ServeisController::class, 'store'])->name('serveis.store');
Route::get('/admin/serveis/edit/{id}', [ServeisController::class, 'edit'])->name('serveis.edit');
Route::get('/admin/serveis/show/{id}', [ServeisController::class, 'show'])->name('serveis.show');
Route::put('/admin/serveis/update/{id}', [ServeisController::class, 'update'])->name('serveis.update');
Route::delete('/admin/serveis/destroy/{id}', [ServeisController::class, 'destroy'])->name('serveis.destroy');





require __DIR__.'/auth.php';
