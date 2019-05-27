<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//load the user model
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
            'username'=>'required|alpha_dash',
            'email'=>'required|email|unique:users,email,'.$r->input('id'),
            'avatar'=>'image|max:1024']);
        //check validataion result    
        if ($validation->fails()) 
            return response()->json(['errors'=>$validation->errors()], 422);
        //passed input continue to run update operation    
        $user = User::find($r->input('id'));
        
        //check the existance of avatar upload     
        if ($r->has('avatar')){    
            $file = $r->file('avatar');
            $filename = $r->input('username').'.'.$file->extension();
            $path = public_path('files/admin/users/');
            $this->moveFile($file, $filename, $path, $user);
        }    
        //Assign new data
        $user->name = $r->input('name');
        $user->email = $r->input('email');
        
        //validate the existing of file name
        if (isset($filename) && $filename!="")
            $user->avatar = $filename;
        //save the changing
        if ($user->save()){
            //creating thumbnail
            if (isset($filename) && $filename!=""){
                $data['avatar']=$filename; 
                \Image::make($path.$filename)
                    ->fit(200)
                    ->save($path.'thumb-'.$filename);
                $data['image']=$this->toBase64($path.'thumb-'.$filename);
            }
            //return the success message
            $response =['status'=>'success',
                'data'=>(isset($data)?$data:''), 
                'message'=>''];
            return response()->json($response, 200);
        }
        //return the failed message
        return response()->json(['status'=>'error', 'message'=>''], 200);
            
    }
    /**
     * Upload file attach
     * @param mixed $file object file operation
     * @param string $filename
     * @return void
     */
    private function moveFile($file, $filename, $path, $user)
    {
        //validate upload file
        if (isset($file) && $file->isValid()){
            
            //check the existing file refer to form input
            if (file_exists($path.$filename))
                unlink($path.$filename);
            //check the existing file refer to exist data
            if ($user->avatar!="" && file_exists($path.$user->avatar))
                unlink($path.$user->avatar);
            //check the existing file refer to exist data (thumbnail)
            if (file_exists($path.'thumb-'.$user->avatar))
                unlink($path.'thumb-'.$user->avatar);
            
            //move the file to the server
            $file->move($path, $filename);
                    
        }
    }
    private function toBase64($image_location) {
        $image_path = $image_location;
        $image_type = pathinfo($image_path, PATHINFO_EXTENSION);
        $image_data = file_get_contents($image_path);
        $image_base64 = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);
        return $image_base64;
    }
}
