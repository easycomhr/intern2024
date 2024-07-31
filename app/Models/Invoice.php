<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table='invoices';
    protected $fillable = [
        'date',
        'address',
        'total_amount',
        'cus_id',
        'vou_id',
        'price_discount',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'cus_id');
    }

    public function Voucher()
    {
        return $this->belongsTo(Voucher::class, 'vou_id');
    }
    public $timestamps = false;
}
