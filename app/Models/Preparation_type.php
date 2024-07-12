<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preparation_type extends Model
{
    use HasFactory;

    protected $table = 'preparation_types';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'pre_type_id');
    }

    public $timestamps = false;
}
