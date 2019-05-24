<?php

namespace App\Http\Controllers\Admin\Apps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**loading models */
use App\Models\Apps;

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
    /**
     * Getting list of registered Application
     */
    public function getList(Request $r)
    {
        $apps = Apps::where('name', 'like', '%'.$r->input('name').'%')
                        ->get();
        if (is_object($apps) && count($apps)>0)
            return response()->json(['status'=>'success', 'd'=>$apps]);
        else    
            return response()->json(['status'=>'fail']);
    }
}
