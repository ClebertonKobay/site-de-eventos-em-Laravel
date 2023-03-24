@extends('layouts.main')

@section('title','Criar Evento')

@section('content')
  
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" >
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição do evento:</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrição do evento" ></textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" value="Cadeiras" name="items[]" id="Cadeiras"><label for="Cadeiras">Cadeiras</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Palco" name="items[]" id="Palco"><label for="Palco">Palco</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Bebida" name="items[]" id="Bebida"><label for="Bebida">Bebida</label> 
            </div>
            <div class="form-group">
                <input type="checkbox" value="Open Food" name="items[]" id="Open Food"><label for="Open Food">Open Food</label>
            </div>
            <div class="form-group">
                <input type="checkbox" value="Brindes" name="items[]" id="Brindes"><label for="Brindes">Brindes</label>
            </div>
            <div class="form-group">
                <input type="checkbox" value="Certificado" name="items[]" id="Certificado"><label for="Certificado">Certificado</label>
            </div>
        </div>
        <input type="submit" value="Criar Evento" class="btn btn-primary">
    </form>
</div>

@endsection