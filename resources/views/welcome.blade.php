
@extends('layouts.main')

@section('title','Site de eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">

    @if ($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container"  class="row">
        @foreach ($events as $event )
            <div class="card col-md-4">
                <img src="/img/events/{{$event->image ? $event->image : "event_placeholder.jpg"}}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/y',strtotime($event->date)) }}</p>
                    <div class="card-title">{{$event->title}}</div>
                    <p class="card-participants">X Participantes</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($events) == 0 && $search)
            <p>Não foi possivel encontrar nenhum evento com: {{ $search }}. <a href="/">Ver todos</a></p>
        @elseif (count($events) == 0 )
        @endif
    </div>
</div>


@endsection