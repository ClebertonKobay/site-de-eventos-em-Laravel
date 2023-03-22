@extends('layouts.main')

@section('title','produto')

@section('content')
    @if($id != null)
        <p>Exibindo produto id: {{$id}}</p>
    @endif
@endsection