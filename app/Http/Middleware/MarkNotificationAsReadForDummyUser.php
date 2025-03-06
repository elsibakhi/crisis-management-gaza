<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkNotificationAsReadForDummyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id= $request->query('nid');
        $user = \App\Models\DummyUser::find(\Illuminate\Support\Facades\Cookie::get("dummy_user_id"));
        if($id && $user)
        {
            $notification = $user->unreadNotifications()->find($id);
            if($notification)
            {
                $notification->markAsRead();
            }
        }
        return $next($request);
    }
}