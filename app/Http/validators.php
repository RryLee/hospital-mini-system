<?php

use App\Models\User;

$validator->extend(
    'doctor',
    function($attribute, $value, $parameters) {
        $user = User::find($value);

        if ($user == null || $user->department_id == 1) {
            return false;
        }

        return true;
    },
    '请添加正确的医生'
);
