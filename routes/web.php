<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SubJobController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerlengkapanKerjaController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SecurityPricingController;
use App\Http\Controllers\BpjsPerusahaanController;
use App\Http\Controllers\AdditionalBenefitController;


Route::resource('umks', UMKController::class);
Route::resource('jobs', JobController::class);
Route::resource('sub_jobs', SubJobController::class);
Route::resource('persons', PersonController::class);
Route::resource('login', LoginController::class);
Route::resource('perlengkapan_kerja', PerlengkapanKerjaController::class);
Route::resource('bpjsp', BpjsPerusahaanController::class);
Route::resource('login', LoginController::class);
Route::resource('benefit', AdditionalBenefitController::class);

Route::get('/', function () {
    return view('register');
});
Route::get('/perlengkapan/{perlengkapan}', [PerlengkapanKerjaController::class, 'show'])->name('perlengkapan.show');
Route::get('/perlengkapan/{perlengkapan}/edit', [PerlengkapanKerjaController::class, 'edit'])->name('perlengkapan.edit');
Route::get('/perlengkapan/create', [PerlengkapanKerjaController::class, 'create'])->name('perlengkapan.create');
Route::get('/perlengkapan', [PerlengkapanKerjaController::class, 'index'])->name('perlengkapan.index');
Route::get('/umks', [UMKController::class, 'index'])->name('umks.index');
Route::get('/umks/create', [UMKController::class, 'create'])->name('umks.create');
Route::post('/umks', [UMKController::class, 'store'])->name('umks.store');
Route::get('/umks/{umk}', [UMKController::class, 'show'])->name('umks.show');
Route::get('/umks/{umk}/edit', [UMKController::class, 'edit'])->name('umks.edit');
Route::put('/umks/{umk}', [UMKController::class, 'update'])->name('umks.update');
Route::delete('/umks/{umk}', [UMKController::class, 'destroy'])->name('umks.destroy');
Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);
Route::post('/perlengkapan/create', [PerlengkapanKerjaController::class, 'store'])->name('perlengkapan.store');
Route::get('/register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomAuthController::class, 'register']);
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('/security/pricing', 'SecurityPricingController@index');
Route::get('/security-pricing', [SecurityPricingController::class, 'index'])->name('security_pricing');
Route::post('/security-pricing', [SecurityPricingController::class, 'processForm'])->name('processForm');

Route::post('/get-wages', [SecurityPricingController::class, 'getWages']);

Route::get('/security-pricing2', [SecurityPricingController::class, 'index2'])->name('security_pricing2');
Route::post('/security-pricing2', 'SecurityPricingController@index')->name('security_pricing2');

Route::post('/save-gaji-pokok', 'SecurityPricingController@saveGajiPokok');

Route::get('/security-pricing3', [SecurityPricingController::class, 'index3'])->name('security_pricing3');
Route::get('/security/pricing3', 'SecurityPricingController@index');
Route::post('/security-pricing3', [SecurityPricingController::class, 'processForm2'])->name('processForm2');

Route::get('/security-pricing4', [SecurityPricingController::class, 'index4'])->name('security_pricing4');
Route::get('/security/pricing4', 'SecurityPricingController@index');
Route::post('/security-pricing4', [SecurityPricingController::class, 'processForm3'])->name('processForm3');

Route::delete('/perlengkapan/{perlengkapan}', [PerlengkapanKerjaController::class, 'destroy'])->name('perlengkapan.delete');
Route::put('/perlengkapan', [PerlengkapanKerjaController::class, 'update'])->name('perlengkapan.update');
Route::delete('/bpjsp/{bpjsp}', [BpjsPerusahaanController::class, 'destroy'])->name('bpjsp.delete');
Route::put('/bpjsp', [BpjsPerusahaanController::class, 'update'])->name('bpjsp.update');
Route::post('/bpjsp/create', [BpjsPerusahaanController::class, 'store'])->name('bpjsp.store');
Route::get('/bpjsp/{bpjsp}', [BpjsPerusahaanController::class, 'show'])->name('bpjsp.show');
Route::get('/bpjsp/{bpjsp}/edit', [BpjsPerusahaanController::class, 'edit'])->name('bpjsp.edit');
Route::get('/bpjsp/create', [BpjsPerusahaanController::class, 'create'])->name('bpjsp.create');
Route::get('/bpjsp', [BpjsPerusahaanController::class, 'index'])->name('bpjsp.index');
Route::patch('/bpjsp/{bpjsItem}', 'BpjsController@update')->name('bpjsp.update');

Route::delete('/benefit/{benefit}', [AdditionalBenefitController::class, 'destroy'])->name('benefit.delete');
Route::put('/benefit', [AdditionalBenefitController::class, 'update'])->name('benefit.update');
Route::post('/benefit/create', [AdditionalBenefitController::class, 'store'])->name('benefit.store');
Route::get('/benefit/{benefit}', [AdditionalBenefitController::class, 'show'])->name('benefit.show');
Route::get('/benefit/{benefit}/edit', [AdditionalBenefitController::class, 'edit'])->name('benefit.edit');
Route::get('/benefit/create', [AdditionalBenefitController::class, 'create'])->name('benefit.create');
Route::get('/benefit', [AdditionalBenefitController::class, 'index'])->name('benefit.index');
Route::patch('/benefit/{benefitItem}', 'AdditionalBenefitController@update')->name('benefit.update');

Route::post('/store-total-gaji', [SecurityPricingController::class, 'storeTotalGaji'])->name('store.total.gaji');
Route::post('/store-total-gaji', 'SecurityPricingController@storeTotalGaji');
Route::get('/store-total-gaji', 'SecurityPricingController@storeTotalGaji');

Route::get('/security-pricing5', [SecurityPricingController::class, 'index5'])->name('security_pricing5');

Route::get('/security-pricing6', [SecurityPricingController::class, 'index6'])->name('security_pricing5');
