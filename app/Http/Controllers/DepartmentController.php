<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('doctors')->where('id', '!=', 1)->paginate(21);

        return view('departments.index', compact('departments'));
    }
}
