<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::with('department')->where('department_id', '!=', 1)->paginate(21);

        return view('doctors.index', compact('doctors'));
    }

    public function show($id)
    {
        $doctor = User::findOrFail($id);

        return view('doctors.show', compact('doctor'));
    }
}
