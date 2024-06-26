<?php

namespace App\Models;

use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Domain extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'domains';

    protected $fillable = [
        'domain',
        'project_name',
        'expired_datetime',
        'notification_times',
        'reminder_st',
        'reminder_nd',
        'reminder_rd',
    ];
    protected $dates = [
        'expired_datetime',
    ];

    protected $appends = ['expired_datetime_format'];

    public function isExpired(): bool
    {
        $tz = new DateTimeZone('Asia/Tokyo');
        $now = Carbon::now($tz);
        $expiredDatetime = Carbon::parse($this['expired_datetime'], $tz);
        return $expiredDatetime->lt($now);
    }

    public function getExpiredDatetimeFormatAttribute(){
        return empty($this->expired_datetime) ? '' : Carbon::parse($this->expired_datetime)->format('Y/m/d H:i:s');
    }


}
