@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-8">
            <div class="panel-body">
                {!! Form::open(['action' => ['EventController@update', $event->id],'method' => 'PATCH', 'enctype'=> 'multipart/form-data']) !!}

                <div class="form-group">
                    {{Form::label('title', 'Título')}}
                    {{Form::text('title', $event->title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('event_schedule', 'Horario')}}
                    {{Form::text('event_schedule', $event->event_schedule, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Descripción')}}
                    {{Form::textarea('description', $event->description, ['class' => 'form-control ckeditor'])}}
                </div>

                <div class="form-group">
                    {{Form::label('primary_image', 'Imagen principal: '.$event->primary_image)}}
                    <br>
                    {{Form::file('primary_image')}}
                </div>
                <div class="form-group">
                    {{Form::label('secondary_image', 'Imagen secundaria: '.$event->secondary_image)}}
                    <br>
                    {{Form::file('secondary_image')}}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Público') !!}
                    {!! Form::checkbox('status',null,$event->status) !!}
                </div>
                {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
@endsection
