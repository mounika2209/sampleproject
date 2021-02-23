<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModel;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $role = Auth::user();
        $projects = ProjectModel::all();
        if($role['user_role'] == 'Permission1'){
            return view('auth.home',['projects' => $projects]);
        }else if($role['user_role'] == 'Permission2' || $role['user_role'] == 'Permission3'){ 
            return view('project.index',['projects' => $projects]);
        }
        
    }
}
