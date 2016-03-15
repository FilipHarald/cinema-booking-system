<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $request->header("PHP_AUTH_USER");
        $pwd = $request->header("PHP_AUTH_PW");

        $user = User::where(['email' => $user])->first();

        //return response(["user" => $user, "pwd" => $pwd]);

        if (!$user || !password_verify($pwd, $user->password))
            return response(["Error" => "Unauthorized login"], 401);

        return $next($request);
    }
}
