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
        $breadcrumb = ['Application Management'=>''];
        $title = 'Application Management';
        return view('Admin.Apps.index')
                ->with('title', $title)
                ->with('breadcrumb', $breadcrumb);
    }
}
