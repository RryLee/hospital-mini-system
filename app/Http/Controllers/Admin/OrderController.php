<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private static $rules = [
        'patient' => 'required',
        'doctor_id' => 'required|doctor',
        'drug_id' => 'required|exists:drugs,id',
        'drug_amount' => 'required|numeric'
    ];

    private static $attributes = [
        'patient' => '病人姓名',
        'doctor_id' => '医生',
        'drug_id' => '药方',
        'drug_amount' => '药量'
    ];

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
        $orders = Order::with(['drug', 'doctor'])->orderBy('completed', 'ASC')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drugs = Drug::lists('name', 'id');
        $doctors = User::where('department_id', '!=', 1)->lists('name', 'id');

        return view('admin.orders.create', compact('drugs', 'doctors'));
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

        Order::create([
            'patient' => $request->get('patient'),
            'user_id' => $request->get('doctor_id'),
            'drug_id' => $request->get('drug_id'),
            'drug_amount' => $request->get('drug_amount'),
        ]);

        flashy()->success('添加成功');

        return redirect()->route('admin.orders.index');
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
        //
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
        Order::pay($id);

        flashy()->success('提交成功');

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
        $order = Order::find($id);
        $order->delete();

        flashy()->success('删除成功');

        return back();
    }
}
