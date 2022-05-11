@extends('templates.default')

@section('content')
    @foreach($kanjiByTag as $tagKanjis)
        {{$tagKanjis->name}}
    @endforeach
@endsection
