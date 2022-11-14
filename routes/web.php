<?php
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
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

// Route::get('/', [App\Http\Controllers\UsersController::class,'adminlogin']);


require __DIR__.'/auth.php';

// redirect for home
Route::get('/', function(){
    return redirect('/login');
});

// dashboard
Route::get('/dashboard', function () {
    return view('portal_pages.dashboard');
})->middleware(['auth'])->name('dashboard');

// resources routes
Route::resource('designations', DesignationController::class)->middleware(['auth']);
Route::resource('departments', DepartmentController::class)->middleware(['auth']);

// users
Route::get('all-users', [\App\Http\Controllers\UsersController::class, 'all_users'])->middleware(['auth']);
Route::any('add-employee-user',[\App\Http\Controllers\UsersController::class, 'adduserEmployee'])->middleware(['auth']);

// employees
Route::any('all-employees',[\App\Http\Controllers\EmployeeController::class, 'index'])->middleware(['auth']);
Route::any('add-employee',[\App\Http\Controllers\EmployeeController::class,'addEmployee'])->middleware(['auth']);
Route::get('employee/profile/{id}',[\App\Http\Controllers\EmployeeController::class, 'employee_profile'])->middleware(['auth']);
// Route::any('edit/employee/{id}',[App\http\Controllers\EmployeeController::class,'editEmployee']);
// Route::any('edit/employee',[App\http\Controllers\EmployeeController::class,'updateEmployee']);

// Attendences
Route::any('checkin',[\App\Http\Controllers\AttendanceController::class, 'checkin'])->middleware('auth');
Route::get('attendance-list',[\App\Http\Controllers\AttendanceController::class, 'getAllAttendances'])->middleware('auth');
Route::any('mark-manual-attendance',[\App\Http\Controllers\AttendanceController::class, 'markManualAttendance'])->middleware('auth');
Route::any('upload-attendance',[\App\Http\Controllers\AttendanceController::class, 'SaveUploadAttendance'])->middleware('auth');


//Leaves
Route::any('leaves',[\App\Http\Controllers\LeaveController::class, 'index'])->middleware('auth');
Route::post('add-leave',[\App\Http\Controllers\LeaveController::class, 'addLeave'])->middleware('auth');
Route::any('approve-leave/{id}',[\App\Http\Controllers\LeaveController::class, 'approveLeave'])->middleware('auth');
Route::any('reject-leave/{id}',[\App\Http\Controllers\LeaveController::class, 'rejectLeave'])->middleware('auth');
// Route::post('leave/edit',[\App\Http\Controllers\LeaveController::class, 'editLeave'])->middleware('auth');
