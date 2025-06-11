<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\ConfiguracionController;

use App\Http\Controllers\Admin\NotificacionesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\AuditoriaController;
use App\Http\Controllers\Admin\SapController;

use Illuminate\Support\Facades\Auth;
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

#Route::get('/', function () {   return view('index'); });
Route::get('/setlenguaje/{locale}', [HomeController::class, 'setlenguaje'])->name('setlenguaje');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('/sendemail', [HomeController::class, 'sendemail'])->name('sendemail');
Route::get('/logout', [HomeController::class, 'logout'])
->name('home.logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])
->name('home');

Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])
->name('admin.configuracion.index');
Route::get('/admin/configuracion/add', [ConfiguracionController::class, 'add'])
->name('admin.configuracion.add');
Route::post('/admin/configuracion/store', [ConfiguracionController::class, 'store'])
->name('admin.configuracion.store');
Route::post('/admin/configuracion/uploadimg/{id}', [ConfiguracionController::class, 'uploadimg'])
->name('admin.configuracion.uploadimg');
Route::get('/admin/configuracion/{id}/edit', [ConfiguracionController::class, 'edit'])
->name('admin.configuracion.edit');
Route::post('/admin/configuracion/update', [ConfiguracionController::class, 'update'])
->name('admin.configuracion.update');
Route::get('/admin/configuracion/{id}/delete', [ConfiguracionController::class, 'delete'])
->name('admin.configuracion.delete');

Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])
->name('admin.configuracion.index');
Route::get('/admin/configuracion/add', [ConfiguracionController::class, 'add'])
->name('admin.configuracion.add');
Route::post('/admin/configuracion/store', [ConfiguracionController::class, 'store'])
->name('admin.configuracion.store');
Route::post('/admin/configuracion/uploadimg/{id}', [ConfiguracionController::class, 'uploadimg'])
->name('admin.configuracion.uploadimg');
Route::get('/admin/configuracion/{id}/edit', [ConfiguracionController::class, 'edit'])
->name('admin.configuracion.edit');
Route::post('/admin/configuracion/update', [ConfiguracionController::class, 'update'])
->name('admin.configuracion.update');
Route::get('/admin/configuracion/{id}/delete', [ConfiguracionController::class, 'delete'])
->name('admin.configuracion.delete'); 

Route::resource('admin/sap', SapController::class)->names([
    'index' => 'admin.sap.index',
    'create' => 'admin.sap.create',
    'store' => 'admin.sap.store',
    'show' => 'admin.sap.show',
    'edit' => 'admin.sap.edit',
    'update' => 'admin.sap.update',
    'destroy' => 'admin.sap.destroy',
]);

/** Contratos  */

Route::get(
    '/admin/roles',
    [RolesController::class, 'index']
    )->name('admin.roles.index');

Route::get(
    '/admin/roles/add',
    [RolesController::class, 'add']
    )->name('admin.roles.add');

Route::post(
    '/admin/roles',
    [RolesController::class, 'store']
    )->name('admin.roles.store');

Route::get(
    '/admin/roles/{id}/edit',
    [RolesController::class, 'edit']
)->name('admin.roles.edit');


Route::post(
    '/admin/roles/{id}/update',
    [RolesController::class, 'update']
    )->name('admin.roles.update');


Route::get(
    '/admin/roles/{id}/delete',
    [RolesController::class,'delete']
    )->name('admin.roles.delete');





    /** Users */

Route::get(
    '/admin/users',
    [UsersController::class, 'index']
    )->name('admin.users.index');

Route::get(
    '/admin/users/add',
    [UsersController::class, 'add']
    )->name('admin.users.add');

Route::post(
    '/admin/users',
    [UsersController::class, 'store']
    )->name('admin.users.store');

Route::get(
    '/admin/users/{id}/edit',
    [UsersController::class, 'edit']
)->name('admin.users.edit');


Route::post(
    '/admin/users/{id}/update',
    [UsersController::class, 'update']
    )->name('admin.users.update');


Route::get(
    '/admin/users/{id}/delete',
    [UsersController::class,'delete']
    )->name('admin.users.delete');




    /** Reporte */

    Route::get(
        '/admin/reporte/diario',
        [ReporteController::class, 'diario']
        )->name('admin.reporte.diario');
    
    
    
    Route::post(
        '/admin/reporte/diario',
        [ReporteController::class, 'exportDiario']
        )->name('admin.reporte.exportdiario');

Route::get(
    '/admin/reporte/clientes',
    [ReporteController::class, 'clientes']
    )->name('admin.reporte.clientes');



Route::post(
    '/admin/reporte/clientes',
    [ReporteController::class, 'exportClientes']
    )->name('admin.reporte.exportclientes');



Route::get(
    '/admin/reporte/contratos',
    [ReporteController::class, 'contratos']
    )->name('admin.reporte.contratos');



Route::post(
    '/admin/reporte/contratos',
    [ReporteController::class, 'exportContratos']
    )->name('admin.reporte.exportcontratos');

Route::get(
    '/admin/reporte/pagos',
    [ReporteController::class, 'pagos']
    )->name('admin.reporte.pagos');



Route::post(
    '/admin/reporte/pagos',
    [ReporteController::class, 'exportPagos']
    )->name('admin.reporte.exportpagos');

Route::get(
    '/admin/reporte/abonos',
    [ReporteController::class, 'abonos']
    )->name('admin.reporte.abonos');



Route::post(
    '/admin/reporte/abonos',
    [ReporteController::class, 'exportAbonos']
    )->name('admin.reporte.exportabonos');

    /** Auditoria */

    Route::get(
        '/admin/auditoria',
        [AuditoriaController::class, 'index']
        )->name('admin.auditoria.index');




 /** Notificaciones */

 Route::get(
    '/admin/notificaciones',
    [NotificacionesController::class, 'index']
    )->name('admin.notificaciones.index');

 Route::get(
    '/admin/notificaciones/list',
    [NotificacionesController::class, 'list']
    )->name('admin.notificaciones.list');

Route::post(
    '/admin/notificaciones/update',
    [NotificacionesController::class, 'update']
    )->name('admin.notificaciones.update');
    
Route::post(
    '/admin/notificaciones/updateall',
    [NotificacionesController::class, 'updateall']
    )->name('admin.notificaciones.updateall');

    Route::get(
        '/admin/notificaciones/updateall',
        [NotificacionesController::class, 'updateall']
        )->name('admin.notificaciones.updateall');


 /** pagos */