<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    protected $fillable = [
        'name',
        'function_id',
    ];
    public function Function_medicinal()
    {
        return $this->belongsTo(Function_medicinal::class, 'function_id');
    }
    public $timestamps = false;
}
