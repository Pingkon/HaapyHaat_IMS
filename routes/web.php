<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\FarmerController;


Route::get('/', function () {
    return view('auth.login');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


 // Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
     
});

Route::controller(FarmerController::class)->group(function () {
    Route::get('/farmer/all', 'FarmerAll')->name('farmer.all');

});

Route::controller(FarmerController::class)->group(function () {
    Route::get('/farmer/all', 'FarmerAll')->name('farmer.all');

    Route::get('/farmer/add', 'FarmerAdd')->name('farmer.add');

    Route::post('/farmer/store', 'FarmerStore')->name('farmer.store');

    Route::get('/farmer/edit/{id}', 'FarmerEdit')->name('farmer.edit');

    Route::post('/farmer/update', 'FarmerUpdate')->name('farmer.update');


});

 





Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
