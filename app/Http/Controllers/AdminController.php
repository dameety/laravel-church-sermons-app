<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Service;
use App\Sermon;
use App\Category;
use App\Sermonrequest;



class AdminController extends Controller
{
    public function index()
    {
    	// return Auth::guard('admin')->user();
    	$serviceCount = Service::count();
    	$userCount = User::count();
    	$sermonCount = Sermon::count();
    	$categoryCount = Category::count();
    	$adminCount  = Admin::count();
    	$sermonrequestCount = Sermonrequest::count();

        return view('admin.dashboard', compact('serviceCount', 'userCount', 'sermonCount', 'categoryCount', 'adminCount', 'sermonrequestCount'));
    }

    public function allAdminsPage()
    {
        return view('admin.alladmins');
    }




}
