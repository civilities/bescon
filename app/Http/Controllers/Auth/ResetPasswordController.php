<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    //问题 此处中间件是否需要注释掉才能让已登录用户更改密码 未解决 需要先解决邮件问题

    //问题 已登录用户通过此办法修改密码成功后, 应使其登出logout 并跳转登录页面 未解决

/*    public function __construct()
    {
        $this->middleware('guest');
    }
*/
}
