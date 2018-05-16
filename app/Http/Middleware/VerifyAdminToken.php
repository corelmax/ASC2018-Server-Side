<?php

namespace App\Http\Middleware;

use App\AuthModel;
use Closure;

class VerifyAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->query('token');

        $user = AuthModel::where('token', $token)->first();

        if($user === null || $user->role !== 'ADMIN') {
            return response([
                'message' => 'Unauthorized user'
            ], 401);
        }

        return $next($request);
    }
}
