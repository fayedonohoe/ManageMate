<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-26T19:25:04+00:00



use Carbon\Carbon;
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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/roster', 'PageController@roster')->name('roster');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/manager/home', 'Manager\HomeController@index')->name('manager.home');
Route::get('/employee/home', 'Employee\HomeController@index')->name('employee.home');

Route::get('/admin/managers', 'Admin\ManagerController@index')->name('admin.managers.index');
Route::get('/admin/managers/create', 'Admin\ManagerController@create')->name('admin.managers.create');
Route::get('/admin/managers/{id}', 'Admin\ManagerController@show')->name('admin.managers.show');
Route::post('/admin/managers/store', 'Admin\ManagerController@store')->name('admin.managers.store');
Route::get('/admin/managers{id}/edit', 'Admin\ManagerController@edit')->name('admin.managers.edit');
Route::put('/admin/managers{id}', 'Admin\ManagerController@update')->name('admin.managers.update');
Route::delete('/admin/managers{id}', 'Admin\ManagerController@destroy')->name('admin.managers.destroy');

Route::get('/admin/employees', 'Admin\EmployeeController@index')->name('admin.employees.index');
Route::get('/admin/employees/create', 'Admin\EmployeeController@create')->name('admin.employees.create');
Route::get('/admin/employees/{id}', 'Admin\EmployeeController@show')->name('admin.employees.show');
Route::post('/admin/employees/store', 'Admin\EmployeeController@store')->name('admin.employees.store');
Route::get('/admin/employees{id}/edit', 'Admin\EmployeeController@edit')->name('admin.employees.edit');
Route::put('/admin/employees{id}', 'Admin\EmployeeController@update')->name('admin.employees.update');
Route::delete('/admin/employees{id}', 'Admin\EmployeeController@destroy')->name('admin.employees.destroy');



Route::get('/manager/employees', 'Manager\EmployeeController@index')->name('manager.employees.index');
Route::get('/manager/employees/create', 'Manager\EmployeeController@create')->name('manager.employees.create');
Route::get('/manager/employees/{id}', 'Manager\EmployeeController@show')->name('manager.employees.show');
Route::post('/manager/employees/store', 'Manager\EmployeeController@store')->name('manager.employees.store');
Route::get('/manager/employees{id}/edit', 'Manager\EmployeeController@edit')->name('manager.employees.edit');
Route::put('/manager/employees{id}', 'Manager\EmployeeController@update')->name('manager.employees.update');
Route::delete('/manager/employees{id}', 'Manager\EmployeeController@destroy')->name('manager.employees.destroy');

Route::get('/manager/roster', 'manager\RosterController@index')->name('manager.roster.index');

Route::get('/manager/shifts', 'manager\ShiftController@index')->name('manager.shifts.index');
Route::get('/manager/shifts/create', 'manager\ShiftController@create')->name('manager.shifts.create');
Route::get('/manager/shifts/{id}', 'manager\ShiftController@show')->name('manager.shifts.show');
Route::post('/manager/shifts/store', 'manager\ShiftController@store')->name('manager.shifts.store');
Route::get('/manager/shifts{id}/edit', 'manager\ShiftController@edit')->name('manager.shifts.edit');
Route::put('/manager/shifts{id}', 'manager\ShiftController@update')->name('manager.shifts.update');
Route::delete('/manager/shifts{id}', 'manager\ShiftController@destroy')->name('manager.shifts.destroy');

Route::get('/manager/usershifts', 'manager\UserShiftController@index')->name('manager.usershifts.index');
Route::get('/manager/usershifts/create', 'manager\UserShiftController@create')->name('manager.usershifts.create');
Route::get('/manager/usershifts/{id}', 'manager\UserShiftController@show')->name('manager.usershifts.show');



Route::get('/employee/usershifts', 'employee\UserShiftController@index')->name('employee.usershifts.index');
Route::get('/employee/usershifts/{id}', 'employee\UserShiftController@show')->name('employee.usershifts.show');




Route::get('/usershifts', 'UserShiftController@index')->name('usershifts.index');
Route::get('/usershifts/create', 'UserShiftController@create')->name('usershifts.create');
Route::get('/usershifts/{id}', 'UserShiftController@show')->name('usershifts.show');
Route::get('/usershifts{id}/edit', 'UserShiftController@edit')->name('usershifts.edit');
Route::delete('/usershifts{id}', 'UserShiftController@destroy')->name('usershifts.destroy');
