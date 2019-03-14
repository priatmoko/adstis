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
        $title = 'User Profile';
        return view('Admin.Profile.index')
                ->with('breadcrumb', $breadcrumb);
    }
    /**
     * Displaying form user profile setting
     * @return void
     */
    public function setting()
    {
        $breadcrumb = ['User profile'=>route('profile'), 'Setting'=>''];
        $title = 'Profile Setting';
        return view('Admin.Profile.setting')
                ->with('breadcrumb', $breadcrumb);
    }
}
