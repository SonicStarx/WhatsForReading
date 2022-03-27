<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ParentController;


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

Route::get('/', function () {
    return view('/auth/login');
});

//teacher routes
Route::get('/teacher_home', [TeacherController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/topics_objectives',[TeacherController::class, 'topicshome'])->middleware(['auth'])->name('topicshome');
Route::get('/add_topic',[TeacherController::class, 'addtopic'])->middleware(['auth'])->name('new_topic');
Route::put('/add_topic',[TeacherController::class, 'storetopic'])->middleware(['auth'])->name('storetopic');
Route::get('/edit_topic/{id}',[TeacherController::class, 'edittopic'])->middleware(['auth'])->name('edittopic');
Route::put('/edit_topic/{id}',[TeacherController::class, 'updatetopic'])->middleware(['auth'])->name('updatetopic');
Route::get('deletetopic/{id}',[TeacherController::class, 'deletetopic'])->middleware(['auth'])->name('deletetopic');

Route::get('/all_objectives',[TeacherController::class, 'objectiveshome'])->middleware(['auth'])->name('objectiveshome');
Route::get('/add_objective',[TeacherController::class, 'addobjective'])->middleware(['auth'])->name('new_objective');
Route::put('/add_objective',[TeacherController::class, 'storeobjective'])->middleware(['auth'])->name('storeobjective');
Route::get('edit_objective/{id}',[TeacherController::class, 'editobjective'])->middleware(['auth'])->name('editobjective');
Route::get('deleteLO/{id}',[TeacherController::class, 'deleteobjective'])->middleware(['auth']);
Route::put('edit_objective/{id}',[TeacherController::class, 'updateobjective'])->middleware(['auth'])->name('updateLO');


Route::get('/readingrecords',[TeacherController::class, 'readingrecords'])->middleware(['auth'])->name('readingrecords');
Route::get('/viewreadingrecord/{id}',[TeacherController::class, 'viewrecord'])->middleware(['auth'])->name('viewrecord');

Route::get('/classperformance',[TeacherController::class, 'classperformance'])->middleware(['auth'])->name('classperformance');
Route::get('/chartsperformance',[TeacherController::class, 'performancecharts'])->middleware(['auth'])->name('performancecharts');
Route::get('/performancehist/{id}',[TeacherController::class, 'individualperformance'])->middleware(['auth'])->name('individualperformance');
Route::get('/pupilassessment/new/{id}',[TeacherController::class, 'pupilassessment'])->middleware(['auth'])->name('pupilassessment');
Route::put('/addpupilassessment/{id}',[TeacherController::class, 'addpupilassessment'])->middleware(['auth'])->name('addassessment');
Route::put('/chngpupilassessment/{id}',[TeacherController::class, 'updatepupilassessment'])->middleware(['auth'])->name('updateassessment');
Route::get('/pupilassessment/{id}',[TeacherController::class, 'editpupilassessment'])->middleware(['auth'])->name('editassessment');

Route::get('/pupillevels/{id}',[TeacherController::class, 'pupillevels'])->middleware(['auth'])->name('pupillevels');
Route::put('/pupillevels/{id}',[TeacherController::class, 'updatepupillevels'])->middleware(['auth'])->name('updatepupillevels');

Route::get('/readinglists',[TeacherController::class, 'readinglists'])->middleware(['auth'])->name('readinglists');
Route::get('/viewreadinglists/{date}',[TeacherController::class, 'viewlist'])->middleware(['auth'])->name('viewlist');
Route::get('/newreadinglist',[TeacherController::class, 'createnewlist'])->middleware(['auth'])->name('newlist');
Route::get('/newentry/{id}',[TeacherController::class, 'allocatebook'])->middleware(['auth'])->name('assignbook');
Route::put('/savenewlist/{id}',[TeacherController::class, 'savereadinglist'])->middleware(['auth'])->name('savenewlist');

//admin routes
Route::get('/admindash', [AdminController::class, 'show'])->middleware(['auth'])->name('admindash');
Route::get('deleteuser/{id}',[AdminController::class,'deleteuser']);
Route::get('adduser',[AdminController::class,'adduser'])->name('adduser');
Route::put('adduser',[AdminController::class,'store'])->name('storeuser');
Route::get('edituser/{id}',[AdminController::class,'edituser'])->name('edituser');
Route::put('edituser/{id}',[AdminController::class,'update'])->name('update');

//Librarian routes
Route::get('/library', [LibrarianController::class, 'librarymain'])->middleware(['auth'])->name('librarymain');
Route::get('/new_book', [LibrarianController::class, 'createbook'])->middleware(['auth'])->name('new_book');
Route::put('/new_book', [LibrarianController::class, 'store'])->name('storebook');
Route::get('/book_info/{id}', [LibrarianController::class, 'viewbook'])->name('viewbook');
Route::get('delete/{id}',[LibrarianController::class,'delete'])->name('deletebook');
Route::get('edit/{id}',[LibrarianController::class,'editbook'])->name('editbook');
Route::put('edit/{id}',[LibrarianController::class,'update'])->name('updatebook');

//Parent routes
Route::get('/parentlanding', [ParentController::class, 'dashboard'])->middleware(['auth'])->name('parenthome');
Route::get('/pupilreading', [ParentController::class, 'recordshub'])->middleware(['auth'])->name('recordshub');
Route::get('/pupilreadingupdate/{id}', [ParentController::class, 'recordstatus'])->middleware(['auth'])->name('markasread');
Route::get('/pupilperform', [ParentController::class, 'performancehub'])->middleware(['auth'])->name('performancehub');
Route::get('/pupilobjs/{id}', [ParentController::class, 'objectivesview'])->middleware(['auth'])->name('objectivesview');

require __DIR__.'/auth.php';
