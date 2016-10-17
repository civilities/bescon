<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    //问题 SMTP服务器需要通过SSL, 现在情况下发不出邮件  为解决

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //问题 已登录用户不能访问此界面, 通过邮箱更改密码  已解决  注释guest访客中间件

/*    public function __construct()
    {
        $this->middleware('guest');
    }*/
}
