<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Overide method in AuthenticateUser
     * add feature username besides email and add status (active=Y)  
     * validate form email, is it email form or username form
     * It switch column filtering, using column email or username
     * @param mixed $request object laravel Request
     * @return array
     */
    protected function credentials(Request $request)
    {
        //assign username
        $u = $this->username();
        $username = $request->get($u);
        //assign the field, validate user login type, using email or username 
        $this->field=filter_var($username, FILTER_VALIDATE_EMAIL)?$u:'username';
        //return the result
        return [
            $this->field => $username,
            'password' => $request->password,
            'active'=>'Y'];
    }
    /**
     * Overide method in AuthenticateUser
     * Capture failed login as an impact of customizing credential
     * @param mixed $request Object Laravel Request
     * @return void
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        //capture invalid username error message 
        $errors = [$this->username() => [trans('auth.failed')]];
        //Run the query for checking the user post form 
        $user = User::where($this->field, $request->email)->first();
        //validate password and user active status
        if ($user && \Hash::check($request->password, $user->password) && $user->active!='Y')
            $errors = [$this->username() => [trans('auth.inactive')]];
        //return the result
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
