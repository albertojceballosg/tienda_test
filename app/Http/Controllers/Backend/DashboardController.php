<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->query = Auth::user()->type;
            if($this->query == 'backend'){
                return $next($request);
            }else{
                return redirect()->route('inicio');
            }  
        });
    }

    public function index()
    {
        return view('backend.dashboard.index');
    }
}
