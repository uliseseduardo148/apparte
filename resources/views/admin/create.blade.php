@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-8">
            <div class="panel-body">
                {!! Form::open(['action' => ['EventController@store'],'method' => 'POST', 'enctype'=> 'multipart/form-data', 'id' => 'form']) !!}

                <div class="form-group">
                    {{Form::label('title', 'Título')}}
                    {{Form::text('title', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('event_schedule', 'Horario')}}
                    {{Form::text('event_schedule', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Descripción')}}
                    {{Form::textarea('description', '', ['class' => 'form-control ckeditor'])}}
                </div>

                <div class="form-group">
                    {{Form::label('primary_image', 'Imagen principal')}}
                    <br>
                    {{Form::file('primary_image')}}
                </div>
                <div class="form-group">
                    {{Form::label('secondary_image', 'Imagen secundaria')}}
                    <br>
                    {{Form::file('secondary_image')}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Publicar')}}
                    {{ Form::checkbox('status',null,true)}}
                </div>

                <div class="pull-right">
                    <a href="/events" type="button" class="btn btn-light">Cancelar</a>
                    <input type="button" class="btn btn-danger" id="btn-reset" value="Limpiar" />
                    {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
                </div>

                {!! Form::close() !!}


            </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>
@endsection
