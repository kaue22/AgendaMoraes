<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Str;
use Illuminate\Support\Facades\Route;
use App\User;
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
        
        $users = Auth::user();

      //  $users = User::all(['name']);
        /* echo("USer");
        var_dump($user);*/
        
      /*  var_dump($user);
        die();*/
        return view(
            'admin.pages.home',
            ['users' => $users,]
        );
        //return view('admin.pages.home');
    }
}
