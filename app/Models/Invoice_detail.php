<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    use HasFactory;
    protected $table='invoice_details';
    protected $fillable = [
        'invoice_id',
        'pro_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function Product_detail()
    {
        return $this->belongsTo(Product_detail::class, 'pro_id');
    }

    public function Invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
    public $timestamps = false;
}
