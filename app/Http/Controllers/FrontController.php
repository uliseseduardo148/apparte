<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $data = Events::where('status', '=', 1)->paginate(5);
        return view('public.index',compact('data'));
    }
}
