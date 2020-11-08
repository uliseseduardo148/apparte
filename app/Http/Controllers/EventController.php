<?php

namespace App\Http\Controllers;

use App\Events;
use App\Http\Requests\EvenRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $event;

    public function __construct()
    {
        $this->event = new Events();
    }

    /**
     * Mostramos la vista paginada a 10 elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('title', 'desc')->paginate(10);
        return view('admin.index',compact('events'));
    }

    /**
     * Mostramos el formulario de registro
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Se registran los datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvenRequest $request)
    {
        $validatedData = $request->validated();

        //se mueven las imágenes al directorio
        $primary_image = $this->event->uploadPrimaryImage($request);
        $secondary_image = $this->event->uploadSecondaryImage($request);

        $event = new Events();
        $event->title = $validatedData['title'];
        $event->event_schedule = $validatedData['event_schedule'];
        $event->description = $validatedData['description'];
        $event->primary_image = $primary_image;
        $event->secondary_image = $secondary_image;

        //si el checkbox esta en on (activo), el status es 1
        $request->input('status') ? $event->status = 1 : $event->status = 0;
        $event->save();

        return redirect('/events')->with('success_msg', 'Evento registrado');
    }

    /**
     * Mostramos el formulario cargado con los registros
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        return view('admin.edit',compact('event'));
    }

    /**
     * Se actualizan los datos de un registro
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $validatedData = $request->validated();
        $event = Events::find($id);

        //se mueven las imágenes al directorio en caso de que se actualizen, sino quedan las que estaban
        $primary_image = $this->event->uploadPrimaryImage($request) ?: $event['primary_image'];
        $secondary_image = $this->event->uploadSecondaryImage($request) ?: $event['secondary_image'];

        $event->title = $validatedData['title'];
        $event->event_schedule = $validatedData['event_schedule'];
        $event->description = $validatedData['description'];
        $event->primary_image = $primary_image;
        $event->secondary_image = $secondary_image;

        //si el checkbox esta en on (activo), el status es 1
        $request->input('status') ? $event->status = 1 : $event->status = 0;
        $event->save();

        return redirect('/events')->with('success_msg', 'Evento actualizado');
    }

    /**
     * Permite deshabilitar la vista como público de un evento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        $event = Events::find($request->id);
        $event->status = $request->status;
        $event->save();
        return response()->json(['msg_success'=>'Deshabilitado correctamente.']);
    }

}
