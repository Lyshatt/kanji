@extends('templates.default')

@section('content')
    @foreach($kanjiByTag as $tagKanjis)
        {{$tagKanjis->name}}
    @endforeach

    <div id="lesson-app">
        <example-component></example-component>
    </div>

    <script src="./js/lesson-app.js"></script>

@endsection
