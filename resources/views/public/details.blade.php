@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm-8">
            <div class="card mb-3">
                <img class="card-img-top rounded principal" src="/images/{{ $event->primary_image}}">
                <div class="card-body">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="secondary rounded" src="/images/{{ $event->secondary_image}}">
                            </div>
                            <div class="card-body">
                                <br>
                                <h5 class="card-title title">Título: <strong>{{ $event->title }}</strong></54>
                                    <h6 class="card-title title">Horario: {{ $event->event_schedule }}</h6>
                                    <hr>
                                    <p class="card-text description">Descripción: {!! $event->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>
@endsection
