@extends('layouts.app')

@section('content')

<!--Carousel-->
<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            @foreach($data as $value)
            <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach( $data as $value )
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{url('/images/'.$value->primary_image)}}" class="d-block w-100" height="300" width="350">
                <div class="carousel-caption d-none d-md-block" style="background-color: black; opacity: 0.5;">
                    <h5>{{$value->title}}</h5>
                    <br>
                    <h5>{{$value->event_schedule}}</h5>
                    <p>{!!$value->description!!}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href=".carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--Carousel-->
@endsection
