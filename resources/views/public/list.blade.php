@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm-10">
            @foreach($events as $event)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="rounded image-list" src="/images/{{ $event->primary_image}}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Título: <strong>{{ $event->title }}</strong></h5>
                                    <p class="card-text">Descripción: {!! $event->description !!}</p>
                                    <br>
                                    <h6 class="card-title">Horario: {{ $event->event_schedule }}</h6>
                                    <a href="{{ url('/show/'.$event->id) }}" type="button" class="btn btn-info pull-right"><i class="fa fa-info"> Detalles </i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{$events->links()}}
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>

@endsection
