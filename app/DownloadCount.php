<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DownloadCount extends Model
{
    public function getCount()
    {
        return DB::table('download_counts AS dc')
            ->select(
                'dc.resource_id',
                'rs.title',
                'rs.language',
                DB::raw('count(resource_id) AS total')
            )
            ->leftJoin('resources AS rs', 'rs.id', '=', 'dc.resource_id')
            ->where('dc.created_at', '>', \Carbon\Carbon::now()->subDays(30))
            ->groupBy('resource_id','rs.title','dc.resource_id','rs.language')
            ->orderBy('total','DESC')
            ->limit(10)
            ->get();
    }
}
