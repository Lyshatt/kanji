@extends('templates.plain')

@section('content')

    <div id="static-lesson-app">
        <static-lesson></static-lesson>
    </div>

    <script src="{{ asset('js/static-lesson-app.js') }}"></script>

@endsection
