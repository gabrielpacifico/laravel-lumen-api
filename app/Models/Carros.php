<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Carros extends Model
{

        protected $table = 'cars';

        protected $fillable = [
            'modelo',
            'fabricante',
            'ano_fab'
        ];

        public $timestamps = false;


}