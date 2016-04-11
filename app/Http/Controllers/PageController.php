<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'me']);
    }

    public function index()
    {
        return view('home');
    }

    public function me()
    {
        return view('me');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ], [], [
            'name' => '姓名',
            'password' => '密码',
        ]);

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        flashy()->success('更新成功');

        return back();
    }
}
