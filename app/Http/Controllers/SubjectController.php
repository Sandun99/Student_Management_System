<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subject.index');
    }

    public function create()
    {
        return view('subject.create');
    }
}
