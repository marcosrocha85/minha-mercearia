<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Campos preenchíveis.
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'price',
    ];
}
