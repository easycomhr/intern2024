<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class function_medicinal extends Model
{
    use HasFactory;

    protected $table = 'function_medicinals';

    protected $fillable = [
        'name',
        'display',
    ];
    public $timestamps = false;
}
