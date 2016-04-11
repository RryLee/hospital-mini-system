<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrugController extends Controller
{
    private static $rules = [
        'name' => 'required|min:2',
        'price' => array('required', 'regex:/^(\d+|\d+\.\d+)$/'),
        'function' => 'min:2'
    ];

    private static $attributes = [
        'name' => '名称',
        'price' => '价格',
        'function' => '功能'
    ];

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::paginate(10);

        return view('admin.drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drug = new Drug;

        return view('admin.drugs.create', compact('drug'));
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

        Drug::create($request->all());

        flashy()->success('添加成功');

        return redirect()->route('admin.drugs.index');
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
        $drug = Drug::findOrFail($id);

        return view('admin.drugs.edit', compact('drug'));
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
        $this->validate($request, self::$rules, [], self::$attributes);

        $drug = Drug::findOrFail($id);
        $drug->update($request->all());

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
        $drug = Drug::findOrFail($id);

        $drug->delete();

        flashy()->success('删除成功');

        return back();
    }
}
