<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::paginate(12);
        
    return view('subjects.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments =Department::get();
        return view('subjects.create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields=$request->validate([
        'name'=>'required',
        'code'=>'required',
        'department_id'=>'required'
    ]);
    Subject::create($formFields);
    return Redirect::route('subjects.index')->with('status','subject added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::where('id','=',$id)->with('department')->first();

        return view('subjects.show',['subject'=>$subject ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $departments =Department::get();
        return view('subjects.edit',['subject'=>$subject,'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $formFields=$request->validate([
            'name'=>'required',
            'code'=>'required',
            'department_id'=>'required'
        ]);

        $subject->update($formFields);
        return Redirect::route('subjects.show',$subject->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return Redirect::route('subjects.index')->with('status','subject deleted successfully');
    }
}
