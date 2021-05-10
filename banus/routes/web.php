<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEndController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProjectesController;
use App\Http\Controllers\ServeisController;
use App\Http\Controllers\XarxesSocialsController;
use App\Http\Controllers\InformacioEmpresaController;
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
Route::get('/admin', [BackEndController::class, 'index'])->name('b.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//frontend
Route::get('/', [frontEndController::class, 'index'])->name('f.index');
Route::get('/projectes', [frontEndController::class, 'showprojectes'])->name('projectes.view');
Route::get('/contacte', [frontEndController::class, 'showcontacte'])->name('contacte.view');

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

//xarxes socials
Route::get('/admin/xarxes', [XarxesSocialsController::class, 'index'])->name('xarxes.index');
Route::get('/admin/xarxes/create', [XarxesSocialsController::class, 'create'])->name('xarxes.create');
Route::post('/admin/xarxes/store', [XarxesSocialsController::class, 'store'])->name('xarxes.store');
Route::get('/admin/xarxes/edit/{id}', [XarxesSocialsController::class, 'edit'])->name('xarxes.edit');
Route::get('/admin/xarxes/show/{id}', [XarxesSocialsController::class, 'show'])->name('xarxes.show');
Route::put('/admin/xarxes/update/{id}', [XarxesSocialsController::class, 'update'])->name('xarxes.update');
Route::delete('/admin/xarxes/destroy/{id}', [XarxesSocialsController::class, 'destroy'])->name('xarxes.destroy');

//informacio empresa
Route::get('/admin/informacio-empresa', [InformacioEmpresaController::class, 'index'])->name('informacio.empresa.index');
Route::post('/admin/informacio-empresa/store', [InformacioEmpresaController::class, 'store'])->name('informacio.empresa.store');
Route::get('/admin/informacio-empresa/edit', [InformacioEmpresaController::class, 'edit'])->name('informacio.empresa.edit');
Route::put('/admin/informacio-empresa/update', [InformacioEmpresaController::class, 'update'])->name('informacio.empresa.update');


require __DIR__.'/auth.php';
