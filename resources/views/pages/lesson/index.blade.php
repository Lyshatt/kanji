@extends('templates.default')

@section('content')

    <div id="lesson-app">
        <kanji-lesson :kanji='@json($kanjiByTag)'></kanji-lesson>
    </div>

    <script src="./js/lesson-app.js"></script>

@endsection
