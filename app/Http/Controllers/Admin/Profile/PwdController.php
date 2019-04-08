<?php
/**
 * Password Controller, handle all operation user profile change password
 */
namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class PwdController extends Controller
{
    /**
     * Change password event
     * @param void $r laravel request object
     * @return string json 
     */
    public function change(Request $r)
    {
        //form validation
        $validation = \Validator::make($r->all(),['password' => ['required', 'string', 'min:8', 'confirmed']]);
        //add custom validator to validate current password, make sure that actor are user owner
        $validation->after(function($validation) use($r){
            if (!\Hash::check($r->input('password_current'), \Auth::user()->password))
                $validation->errors()->add('password_current', 'Please fill in matched password to your user!');
        });    
        //check validataion result    
        if ($validation->fails()) 
            return response()->json(['status'=>'error', 'errors'=>$validation->errors()], 422);
        //run the operation to change password    
        $user = User::find($r->input('id'));        
        $user->password=\Hash::make($r->input('password'));
        if ($user->save()){
            \Auth::logoutOtherDevices($r->input('password'));
            \Auth::logout();
            //return the success message
            $response =['status'=>'success','data'=>'','message'=>''];
            return response()->json($response, 200);
        }
    }
}
