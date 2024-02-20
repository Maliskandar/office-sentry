<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeBoyController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OfficeBoyMonitoringController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index']);
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/dashboard/pengawas', [PengawasController::class, 'pengawas'])->middleware('userAkses:pengawas');
    Route::get('/dashboard/kabag_urdal', [DirutController::class, 'kabag_urdal'])->middleware('userAkses:kabag_urdal');
    Route::get('/dashboard/office_boy', [OfficeBoyController::class, 'office_boy'])->middleware('userAkses:office_boy');
    Route::get('/logout', [SesiController::class, 'logout']);
});

// Route::get('/some-route', function () {
// })->middleware('role:dirut_umum');

Route::get('/createOfficeBoy', [OfficeBoyController::class, 'create']);
Route::post('/store-office-boy', [OfficeBoyController::class, 'store']);

Route::middleware(['auth', 'profile.complete'])->group(function () {
    // Route yang memerlukan profil lengkap
});

// Route Office Boy
Route::get('/office-boy/edit-profile', [OfficeBoyController::class, 'editProfile'])->name('office_boy.edit_profile');
Route::put('/office-boy/update-profile', [OfficeBoyController::class, 'updateProfile'])->name('office_boy.update_profile');
Route::get('/office-boy/profile', [OfficeBoyController::class, 'showProfile'])->name('office_boy.profile');
Route::get('/office-boys/tasks', [OfficeBoyController::class, 'showTasks'])->name('office_boys.tasks')->middleware('auth');
Route::post('/office-boy/submit-report', [OfficeBoyController::class, 'submitReport'])->name('office_boy.submit_report');
Route::get('/office-boy/trackings', [OfficeBoyController::class, 'showTrackings'])->name('officeboy.trackings');
Route::post('/office-boy/update-photo', [OfficeBoyController::class, 'updatePhoto'])->name('office_boy.update_photo');
Route::get('/tasks/{id}/detail', [OfficeBoyController::class, 'showTaskDetail'])->name('tasks.detail');
Route::get('/submit-task', [OfficeBoyController::class, 'showForm'])->name('office_boy.show_form');
Route::post('/submit-task', [OfficeBoyController::class, 'submitReport'])->name('office_boy.submit');



// Route Pengawas
Route::get('/pengawas/office-boys', [PengawasController::class, 'index'])->name('pengawas.index');
Route::delete('/pengawas/office-boys/{id}', [PengawasController::class, 'destroy'])->name('pengawas.destroy');
Route::get('/pengawas/office-boys/edit/{id}', [PengawasController::class, 'edit'])->name('pengawas.edit');
Route::put('/pengawas/office-boys/update/{id}', [PengawasController::class, 'update'])->name('pengawas.update');
Route::get('/pengawas/monitorings', [OfficeBoyMonitoringController::class, 'monitoring'])->name('monitorings.monitoring');
Route::get('/pengawas/tugas-office-boys/assign-random', [OfficeBoyMonitoringController::class, 'assignRandom'])->name('assign.random');
Route::post('/office-boy-monitorings/reset-tasks', [OfficeBoyMonitoringController::class, 'resetTasks'])->name('office-boy-monitorings.reset-tasks');
Route::get('/office-boy-monitorings/filter', [OfficeBoyMonitoringController::class, 'filterTasksByDate'])->name('office-boy-monitorings.filter');
Route::get('/pengawas/tracking', [PengawasController::class, 'showTrackingForm'])->name('pengawas.tracking');
Route::post('/pengawas/trackings', [PengawasController::class, 'Trackings'])->name('pengawas.trackings');
Route::get('/pengawas/office-boys/{id}', [PengawasController::class, 'show'])->name('pengawas.office-boys.show');
Route::get('/get-office-boys', [PengawasController::class, 'getOfficeBoysByRoom'])->name('get-office-boys');
Route::get('/dashboard/pengawas/monitorings', [PengawasController::class, 'showMonitorings'])->name('pengawas.monitorings');
Route::get('/pengawas/tracking-results', [PengawasController::class, 'showTrackingResults'])->name('pengawas.tracking-results');
// Route::post('/pengawas/monitorings/tracking', [PengawasController::class, 'tracking'])->name('tracking.store');
// Route::get('/pengawas/tracking', [PengawasController::class, 'showTrackingForm'])->name('pengawas.tracking');


// Route Dirut Umum
Route::get('/dirut/office-boys', [DirutController::class, 'index'])->name('dirut.index');
// Route::get('/dirut/office-boys', [DirutController::class, 'index'])->name('dirut.office-boys.index');
Route::get('/dirut/office-boys/{id}', [DirutController::class, 'show'])->name('dirut.office-boys.show');
Route::get('/dirut/monitorings', [OfficeBoyMonitoringController::class, 'index'])->name('monitorings.index');
Route::get('/dirut/tracking-results', [DirutController::class, 'showTrackingResults'])->name('pengawas.tracking-results');
Route::get('/dashboard/kabag_urdal/monitorings', [OfficeBoyMonitoringController::class, 'showMonitorings'])->name('kabag_urdal.monitorings');
Route::get('/dashboard/monitorings/filter', [DirutController::class, 'filterTasksByDate'])->name('kabag_urdal.filter');