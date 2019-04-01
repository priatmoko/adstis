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
            'email'=>'required|email',
            'avatar'=>'image|max:1024']);
        //check validataion result    
        if ($validation->fails()) 
            return response()->json(['errors'=>$validation->errors()], 422);
        
        //check the existance of avatar upload     
        if ($r->has('avatar')){    
            $file = $r->file('avatar');
            $filename = $r->input('username').'.'.$file->extension();
            $path = public_path('\files\admin\users\\');
            $this->moveFile($file, $filename, $path);
        }    
        //passed input continue to run update operation    
        $user = User::find($r->input('id'));
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        if (isset($filename) && $filename!="")
            $user->avatar = $filename;
        if ($user->save())
            return response()->json(['data'=>'y']);
    }
    /**
     * Upload file attach
     * @param mixed $file object file operation
     * @param string $filename
     * @return void
     */
    private function moveFile($file, $filename, $path)
    {
        //validate upload file
        if (isset($file) && $file->isValid()){
            
            //check file existing
            if (file_exists($path.$filename))
                unlink($path.$filename);
            
            //move the file to the server
            $file->move($path, $filename);
                    
        }
    }
}
