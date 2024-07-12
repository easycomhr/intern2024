<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table='images';
    protected $fillable = [
        'name',
        'image',
        'product_id',
    ];
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public $timestamps = false;
}
