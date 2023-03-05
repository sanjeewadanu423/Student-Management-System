<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function __construct()
    {
        
        $this->middleware('student.only')->only('redirectTo');
    }

    public function redirectTo(){
        $user = Auth::user();

        $role = $user->getRoleNames();

// dd($role[0]);

            switch ($role[0]) {

                case 'student':

                        return '/student';
                    break;

            }

    }
}
