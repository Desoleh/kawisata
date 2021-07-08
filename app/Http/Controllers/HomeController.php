<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if(Auth::user() && Auth::user()->roles == 'ADMIN') {
            return redirect('/admin');
        }
        return redirect('/user');
    }




        // if ($request->user()->hasRole('user')) {
        //     return redirect('user');
        // }

        // if ($request->user()->hasRole('admin')) {
        //     return redirect('admin');
        // }
    // }
}
