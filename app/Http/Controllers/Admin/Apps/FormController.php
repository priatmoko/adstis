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
        $breadcrumb = ['Application Management'=>route('apps'), 'Register New Application'=>''];
        $title = 'Register New Application';
        return view('Admin.Apps.create')
                ->with('breadcrumb', $breadcrumb)
                ->with('title', $title);
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
        $apps = new Apps;
        $apps->name = $r->input('name');
        $apps->parent = $r->input('parent');
        $apps->node_name = $r->input('node_name');
        $apps->url = $r->input('url');
        $apps->color = $r->input('color');
        $apps->icon = $r->input('icon');
        $apps->desc = $r->input('desc');
        $apps->sorter = $r->input('sorter');
        $apps->save();
        
        return response()->json(['status'=>'success']);
    }

}
