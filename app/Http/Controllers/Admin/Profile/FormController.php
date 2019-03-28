<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class FormController extends Controller
{
    /**
     * Store the post data user profile
     * @param void object laravel Request
     * @return string json
     */
    public function store(Request $r)
    {
        //validate the input
        $validation =\Validator::make($r->all(), [
            'name'=>'required|max:191',
            'id'=>'required',
            'username'=>'required',
            'email'=>'required|email']);
        //check validataion result    
        if ($validation->fails()) 
            return response()->json(['errors'=>$validation->errors()], 422);
        //passed input continue to run update operation    
        $user = User::find($r->input('id'));
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        if ($user->save())
            return response()->json(['data'=>'y']);
    }
}
