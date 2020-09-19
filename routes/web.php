<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsInfo;
use App\Http\Controllers\AdminInfo;
use App\Http\Controllers\AdminStudents;
use App\Http\Controllers\AdminCourses;
use App\Http\Controllers\AdminSemesters;
use App\Http\Controllers\AdminSubjects;
/*
|--------------------------------------------------------------------------
| Home / Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminInfo::class,'index'])->name('dashboard');
/*
|--------------------------------------------------------------------------
| Students info Routes
|--------------------------------------------------------------------------
|
| table = 'users'
| Use middleware sanctum
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/student/info', [StudentsInfo::class,'index'])->name('studentsinfo.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/student/fetchSemesters/{id}', [StudentsInfo::class,'fetchSemesters'])->name('studentsinfo.fetchsemesters');
Route::middleware(['auth:sanctum', 'verified'])->get('/student/fetchSubjects/{id}', [StudentsInfo::class,'fetchSubjects'])->name('studentsinfo.fetchsubjects');

Route::middleware(['auth:sanctum', 'verified'])->get('/downloadPDF',[AdminInfo::class,'downloadPDF']);
/*
|--------------------------------------------------------------------------
| Admin students Routes
|--------------------------------------------------------------------------
|
| CRUD Operation
| table = 'users'
| Use middleware sanctum
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/students/all', [AdminStudents::class,'index'])->name('adminstudents.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/students/add', [AdminStudents::class,'add'])->name('adminstudents.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/students/edit/{id}', [AdminStudents::class,'update'])->name('adminstudents.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/students/edit', [AdminStudents::class, 'updateSubmit'])->name('adminstudents.editsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/students/delete/{id}', [AdminStudents::class,'delete'])->name('adminstudents.delete');
/*
|--------------------------------------------------------------------------
| Admin courses Routes
|--------------------------------------------------------------------------
|
| CRUD Operation
| table = 'courses'
| Use middleware sanctum
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/courses/all', [AdminCourses::class,'index'])->name('admincourses.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/courses/add', [AdminCourses::class,'add'])->name('admincourses.add');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/courses/add', [AdminCourses::class, 'addSubmit'])->name('admincourses.addsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/courses/edit/{id}', [AdminCourses::class,'update'])->name('admincourses.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/courses/edit', [AdminCourses::class, 'updateSubmit'])->name('admincourses.editsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/courses/delete/{id}', [AdminCourses::class,'delete'])->name('admincourses.delete');
/*
|--------------------------------------------------------------------------
| Admin semesters Routes
|--------------------------------------------------------------------------
|
| CRUD Operation
| table = 'semesters'
| Use middleware sanctum
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/semesters/all', [AdminSemesters::class,'index'])->name('adminsemesters.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/semesters/add', [AdminSemesters::class,'add'])->name('adminsemesters.add');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/semesters/add', [AdminSemesters::class, 'addSubmit'])->name('adminsemesters.addsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/semesters/edit/{id}', [AdminSemesters::class,'update'])->name('adminsemesters.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/semesters/edit', [AdminSemesters::class, 'updateSubmit'])->name('adminsemesters.editsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/semesters/delete/{id}', [AdminSemesters::class,'delete'])->name('adminsemesters.delete');

/*
|--------------------------------------------------------------------------
| Admin subjects Routes
|--------------------------------------------------------------------------
|
| CRUD Operation
| table = 'subjects'
| Use middleware sanctum
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/subjects/all', [AdminSubjects::class,'index'])->name('adminsubjects.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/subjects/add', [AdminSubjects::class,'add'])->name('adminsubjects.add');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/subjects/add', [AdminSubjects::class, 'addSubmit'])->name('adminsubjects.addsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/subjects/edit/{id}', [AdminSubjects::class,'update'])->name('adminsubjects.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/subjects/edit', [AdminSubjects::class, 'updateSubmit'])->name('adminsubjects.editsubmit');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/subjects/delete/{id}', [AdminSubjects::class,'delete'])->name('adminsubjects.delete');
