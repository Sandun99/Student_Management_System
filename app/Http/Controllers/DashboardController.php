<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalSubjects = Subject::count();
        return view('dashboard.index' , compact('totalTeachers', 'totalStudents', 'totalCourses', 'totalSubjects'));
    }
}
