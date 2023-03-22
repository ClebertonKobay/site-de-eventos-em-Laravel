
@extends('layouts.main')

@section('title','Site de eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <h2>Próximos eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container"  class="row">
        @foreach ($events as $event )
            <div class="card col-md-4">
                <img src="/img/events/{{$event->image ? $event->image : "event_placeholder.jpg"}}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">10/09/2023</p>
                    <div class="card-title">{{$event->title}}</div>
                    <p class="card-participants">X Participantes</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection