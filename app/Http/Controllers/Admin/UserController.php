<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private static $rules = [
        'department_id' => 'required|exists:departments,id',
        'email' => 'required|email|unique:users,email',
        'name' => 'required',
        'age' => 'required|numeric|between:0,120',
        'sex' => 'required|in:male,female',
        'password' => 'required|confirmed|min:6',
    ];

    private static $attributes = [
        'department_id' => '科室',
        'name' => '姓名',
        'email' => '邮箱',
        'age' => '年龄',
        'sex' => '性别',
        'password' => '密码',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('department')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->getDepartmentList();
        $user = new User;

        return view('admin.users.create', compact('departments', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, self::$rules, [], self::$attributes);

        $user = new User;
        $user->department_id = $request->get('department_id');
        $user->name = $request->get('name');
        $user->age = $request->get('age');
        $user->email = $request->get('email');
        $user->sex = $request->get('sex');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        flashy()->success('添加成功');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('department')->findOrFail($id);
        $departments = $this->getDepartmentList();

        return view('admin.users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = collect(self::$rules)
            ->except('email', 'password')
            ->merge(['password' => 'confirmed|min:6'])
            ->toArray();

        $this->validate($request, $rules, [], self::$attributes);

        $user = User::findOrFail($id);
        $user->department_id = $request->get('department_id');
        $user->name = $request->get('name');
        $user->age = $request->get('age');
        $user->sex = $request->get('sex');
        $request->get('password') != '' and $user->password = bcrypt($request->get('password'));

        $user->save();

        flashy()->success('修改成功');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flashy()->success('删除成功');

        return back();
    }

    protected function getDepartmentList()
    {
        return Department::lists('name', 'id');
    }
}
