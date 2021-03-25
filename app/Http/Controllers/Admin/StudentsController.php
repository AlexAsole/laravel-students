<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('public-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.private.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStudent($request);
        $data = $request->all();
        $student = new Student();
        $student->fill($data);
        $student->save();

        return redirect()->route('public-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return redirect()->route('public-show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.private.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validateStudent($request);
        $data = $request->all();
        $student->update($data);
        return redirect()->route('public-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('public-index');
    }

    protected function validateStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'class' => 'required',
            'birth' => 'required',

        ]);
    }
}
