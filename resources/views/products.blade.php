@extends('layouts.main')

@section('title','produtos')

@section('content')

    <h1>Página de produtos</h1>
    <ul>
        @foreach($query as $obj)
            @if($obj == $busca or !isset($busca) )
                <li>{{$obj}}</li>
            @endif
        @endforeach
    </ul>

@endsection
