<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'code',
        'product_id',
        'pack',
        'price',
        'mfg',
        'exp',
    ];
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public $timestamps = false;
}
