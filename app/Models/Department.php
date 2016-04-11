<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleted(function($department) {
            $department->doctors->each(function($doctor) {
                $doctor->delete();
            });
        });
    }

    public function doctors()
    {
        return $this->hasMany('App\Models\User');
    }
}
