<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

// redirect for home
Route::get('/', function () {
    return redirect('/login');
});

// dashboard
Route::view('/dashboard', 'portal_pages.dashboard')->middleware(['auth'])->name('dashboard');
// resources routes
// Route::resources([
//     'designations', DesignationController::class,
//     'departments', DepartmentController::class
// ]);
Route::resource('designations', DesignationController::class)->middleware(['auth']);
Route::resource('departments', DepartmentController::class)->middleware(['auth']);

// users
Route::get('all-users', [\App\Http\Controllers\UsersController::class, 'all_users'])->middleware(['auth']);
Route::any('add-employee-user', [\App\Http\Controllers\UsersController::class, 'adduserEmployee'])->middleware(['auth']);

// employees
Route::any('all-employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->middleware(['auth']);
Route::any('add-employee', [\App\Http\Controllers\EmployeeController::class, 'addEmployee'])->middleware(['auth']);
Route::get('employee/profile/{id}', [\App\Http\Controllers\EmployeeController::class, 'employee_profile'])->middleware(['auth']);
Route::any('edit/employee/{id}', [\App\http\Controllers\EmployeeController::class, 'editEmployee'])->middleware(['auth']);
Route::post('update/employee', [\App\http\Controllers\EmployeeController::class, 'updateEmployee'])->middleware(['auth']);

// Attendences
Route::any('checkin', [\App\Http\Controllers\AttendanceController::class, 'checkin'])->middleware(['auth']);
Route::get('attendance-list', [\App\Http\Controllers\AttendanceController::class, 'getAllAttendances'])->middleware(['auth']);
Route::any('mark-manual-attendance', [\App\Http\Controllers\AttendanceController::class, 'markManualAttendance'])->middleware(['auth']);
Route::any('upload-attendance', [\App\Http\Controllers\AttendanceController::class, 'SaveUploadAttendance'])->middleware(['auth']);
//Leaves
Route::any('leaves', [\App\Http\Controllers\LeaveController::class, 'index'])->middleware(['auth']);
Route::post('add-leave', [\App\Http\Controllers\LeaveController::class, 'addLeave'])->middleware(['auth']);
Route::any('approve-leave/{id}', [\App\Http\Controllers\LeaveController::class, 'approveLeave'])->middleware(['auth']);
Route::any('reject-leave/{id}', [\App\Http\Controllers\LeaveController::class, 'rejectLeave'])->middleware(['auth']);
// Route::post('leave/edit',[\App\Http\Controllers\LeaveController::class, 'editLeave'])->middleware('auth');

//Demo Routes


// main group
// Route::group(['middleware' => 'auth'], function () {
//     // sub group
//     Route::group([
//         'prefix' => 'admin',
//         'middleware' => 'is_admin',
//         'as' => 'admin.'
//     ], function () {
//         Route::get('users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users');
//     });
//     //Sub group for prefix
//     Route::group([
//         'prefix' => 'user',
//         'as' => 'user.',
//     ], function () {
//         Route::post('posts', [\App\Http\Controllers\AttendanceController::class, 'new'])->name('posts');
//     });
// });
