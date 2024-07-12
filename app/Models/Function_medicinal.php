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
    public function categorys()
    {
        return $this->hasMany(Category::class, 'function_id');
    }
    public $timestamps = false;
}
