<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'description',
        'nation',
        'pre_type_id',
        'quantity',
        'ingredient',
        'uses',
        'user_manual',
        'important_note',
        'preserve',
        'packing',
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function Preparation_type()
    {
        return $this->belongsTo(Preparation_type::class, 'pre_type_id');
    }

    public $timestamps = false;
}
