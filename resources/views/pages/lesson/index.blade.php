@extends('templates.default')

@section('content')
    @foreach($kanjiByTag as $tagKanjis)
        {{$tagKanjis->name}}
    @endforeach

    <div id="app">
        <example-component></example-component>
    </div>

@endsection
