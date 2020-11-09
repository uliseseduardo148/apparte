<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Muestra la vista de slider al usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = Events::where('status', '=', 1)->paginate(5);
        return view('public.index',compact('data'));
    }

    /**
     * Permite mostrar un evento determinado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $event = Events::find($id);
        return view('public.details',compact('event'));
    }

    /**
     * Muestra la vista de slider al usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvents(){
        $events = Events::where('status', '=', 1)->paginate(10);
        return view('public.list',compact('events'));
    }

}
