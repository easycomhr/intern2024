<?php

namespace App\Services;

use App\Models\LineFriendSsl;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LineFriendSSLService
{

    /**
     * LINEトークンから取得
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return LineFriendSsl::all();
    }

    /**
     * LINEユーザの登録/更新
     * @param $request
     * @return true
     */

    public function store($request): bool
    {
        $events = $request->all();
        foreach ($events['events'] as $event) {
            if ($event['type'] == 'follow') {
                $lineSSL = new LineFriendSsl();
                $lineSSL->member_id         = $event['source']['userId'];
                $lineSSL->line_token        = $event['source']['userId'] ?? null;
                $lineSSL->line_name         = $event['source']['name'] ?? '';
                $lineSSL->line_picture_url  = '';
                $lineSSL->last_followed_at  = Carbon::now()->format('Y-m-d H:i:s');
                $lineSSL->is_followed       = true;
                $lineSSL->save();
            }
        }

        return true;
    }
}
