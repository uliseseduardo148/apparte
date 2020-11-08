@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 70px;">
    <h2 style="text-align: center;">Eventos</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td><img src="/images/{{ $event->primary_image}}" class="card-img-top mx-auto" style="height: 60px; width: 60px;display: block;" alt="{{ $event->primary_image }}"></td>
                    <td>
                        Título: {{ $event->title }}
                        <br>
                        Horario: {{ $event->event_schedule }}
                    </td>
                    <td>{!! $event->description !!}</td>

                    <td>Pubicado: {{ $event->status ? 'Sí' : 'No' }}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{ url('/events/'.$event->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        </div>
                    </td>
                    <td>
                        <input data-id="{{$event->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $event->status ? 'checked' : '' }}>
                        <label>Público</label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$events->links()}}
    </div>
    <button type="button" class="btn btn-success pull-right" onclick="window.location='{{ url("/events/create") }}'"><i class="fa fa-calendar">Agregar evento</i></button>
</div>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/disable',
              data: {'status': status, 'id': id},
              success: function(data){
                window.location.reload();
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
