<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class PublicController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.public.index', compact('students'));
    }

    public function show(Student $student)
    {
        return view('students.public.show', compact('student'));
    }
}
