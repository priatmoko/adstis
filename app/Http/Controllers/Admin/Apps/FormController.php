<?php

namespace App\Http\Controllers\Admin\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**loading models */
use App\Models\Apps;

class FormController extends Controller
{
    /**
     * Displaying create menu
     */
    public function create()
    {
        return view('Admin.Apps.create');
    }
    /**
     * Store data
     * @param void object laravel Request
     * @return string json 
     */
    public function store(Request $r)
    {
        //validate before saving
        $validation = \Validator::make($r->all(),[
            'name'=>'required',
            'url'=>'required',]);

        if ($validation->fails()) 
            return response()->json(['errors'=>$validation->errors()], 422);
        
        //passing rule go to next step     
        $apps = \Apps::create([
            'name'=>$r->input('name'),
            'parent'=>$r->input('parent'),
            'node_name'=>$r->input('node_name'),
            'url'=>$r->input('url'),
            'color'=>$r->input('color'),
            'icon'=>$r->input('icon'),
            'desc'=>$r->input('desc'),
        ]);
        //success
        return response()->json(['notify'=>'y']);
    }

}
