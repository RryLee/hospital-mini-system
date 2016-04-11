<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'patient',
        'user_id',
        'drug_id',
        'drug_amount',
        'completed',
    ];

    public function drug()
    {
        return $this->belongsTo('App\Models\Drug');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function pay($id)
    {
        $order = self::findOrFail($id);

        $order->update(['completed' => 1]);
    }

    public static function incoming()
    {
        $orders = self::with('drug')->where('completed', 1)->get();

        return $orders->reduce(function($total, $order) {
            return $total + $order->drug_amount * $order->drug->price;
        }, 0);
    }
}
