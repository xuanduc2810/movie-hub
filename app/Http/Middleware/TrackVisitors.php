<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use Carbon\Carbon;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        // Sử dụng session ID thay vì IP
        $sessionId = session()->getId();
        \Log::info('Middleware đang chạy - Session ID: ' . $sessionId);
        
        // Thời gian hết hạn: 10 giây
        $expiresAt = Carbon::now()->addMinutes(10);
        Cache::put("visitor_{$sessionId}", Carbon::now(), $expiresAt);
        
        // Lấy danh sách người truy cập hiện tại
        $visitors = Cache::get('visitors', []);
        $visitors[$sessionId] = Carbon::now();

        // Chỉ giữ lại các session hoạt động trong 10 giây
        $visitors = collect($visitors)
            ->filter(fn($time) => $time->greaterThan(Carbon::now()->subSeconds(10)))
            ->toArray();

        Cache::put('visitors', $visitors, $expiresAt);
        $online_visitors = count($visitors);
        Cache::put('online_visitors', $online_visitors, $expiresAt);

        \Log::info("Số người online: " . $online_visitors);

        return $next($request);
    }
}

