<?php
/**
 * Controller handle operation in user profile
 * Priatmoko - priatmoko.informatics@gmail.com
 * 2019 - 03 - 11
 */
namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display main panel of user profile
     * @return void
     */
    public function index()
    {
        $breadcrumb = ['User profile'=>''];
        return view('Admin.Profile.index')
                ->with('breadcrumb', $breadcrumb);
    }
}
