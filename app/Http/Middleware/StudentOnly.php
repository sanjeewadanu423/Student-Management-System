<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = User::role('student')->get();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
                return $next($request);
            }
        }
        // dd($request);

        return redirect('/login')->with('error', 'You have no permission to reset password.');
    }
}
