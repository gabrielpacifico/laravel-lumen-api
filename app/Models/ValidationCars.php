<?php

namespace App\Models;

class ValidationCars
{
    const RULE_CAR = [
        'modelo' => 'required | max:150',
        'fabricante' => 'required | max:150',
        'ano_fab' => 'required | max:50'
    ];

}