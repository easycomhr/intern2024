<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table='vouchers';
    protected $fillable=[
        'name',
        'price',
        'condition',
        'release_date',
        'end_date',
    ];
    public $timestamps = false;

}
