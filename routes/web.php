<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubjectController;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

Route::get('/', function () {
    return view('index');
});


Route::get('departments', function () {

    $departments = Department::get();
    return view('departments',['departments'=>$departments]);
});

Route::get('subjects', function () {

    $subjects = Subject::get();
    return view('subjects',['subjects'=>$subjects]);
})->name('subjects.x');

// ----------

Route::get('/subjects/create', function () {

    $subjects = Subject::get();
    return view('subjects.create');
});

//------------------

Route::post('/subjects', function (Request $request) {
    $formFields=$request->validate([
        'name'=>'required',
        'code'=>'required',
        'department_id'=>'required'
    ]);
    Subject::create($formFields);
    return redirect()->route('subjects.x');
    
});
Route::resource('subjects',SubjectController::class);


