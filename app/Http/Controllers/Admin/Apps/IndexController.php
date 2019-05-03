<?php

namespace App\Http\Controllers\Admin\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Displaying main panel of application management
     * @return void displaying main panel of Application management
     */
    public function index()
    {
        return view('Admin.Apps.index');
    }
}
