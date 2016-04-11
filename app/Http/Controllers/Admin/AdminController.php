<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use App\Models\User;
use App\Models\Order;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['userCount'] = User::count();
        $data['departmentCount'] = Department::count();
        $data['drugCount'] = Drug::count();
        $data['orderCount'] = Order::count();
        $data['orderNotCompletedCount'] = Order::where('completed', 0)->count();
        $data['incoming'] = Order::incoming();

        return view('admin.index', compact('data'));
    }
}
