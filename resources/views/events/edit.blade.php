@extends('layouts.main')

@section('title','Editando: ' . $event->title)

@section('content')
    
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/events/{{ $event->image }}" class="img-preview" alt="{{$event->title}}">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title}}">
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{\Carbon\Carbon::parse($event->date)->format('Y-m-d')}}">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{$event->city}}">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private"  class="form-control">
                <option value="0">Não</option>
                <option value="1" {{$event->private ? 'selected="selected"' : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição do evento:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrição do evento"  >{{$event->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" value="Cadeiras" name="items[]" id="Cadeiras"{{ (in_array("Cadeiras", $event->items)) ? 'checked="checked"'  :  ' '  }}><label for="Cadeiras" >Cadeiras</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Palco" name="items[]" id="Palco"><label for="Palco" {{ (in_array("Palco", $event->items)) ? 'checked="checked"'  :  ' '  }}>Palco</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Bebida" name="items[]" id="Bebida" {{ (in_array("Bebida", $event->items)) ? 'checked="checked"'  :  ' '  }}><label for="Bebida" >Bebida</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Open Food" name="items[]" id="Open Food" {{ (in_array("Open Food", $event->items)) ? 'checked="checked"'  :  ' '  }}><label for="Open Food" >Open Food</label>
            </div>
            <div class="form-group">
                <input type="checkbox" value="Brindes" name="items[]" id="Brindes" {{ (in_array("Brindes", $event->items)) ? 'checked="checked"'  :  ' '  }}><label for="Brindes" >Brindes</label>
            </div>
            <div class="form-group">
                <input type="checkbox" value="Certificado" name="items[]" id="Certificado" {{ (in_array("Certificado", $event->items)) ? 'checked="checked"'  :  ' '  }}><label for="Certificado" >Certificado</label>
            </div>
        </div>
        <input type="submit" value="Editar Evento" class="btn btn-primary">
    </form>
</div>

@endsection