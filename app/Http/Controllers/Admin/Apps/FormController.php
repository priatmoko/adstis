<?php

namespace App\Http\Controllers\Admin\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     */
    public function store(Request $r)
    {
        return response()->json(['notify'=>'y']);
    }

}
