@extends('templates.default')

@section('content')
    <div>
        <div class="mb-3">
            <a href="/kanji/create">Add new kanji</a>
        </div>

        <div class="mb-3">
            <div>Edit kanji</div>
            @foreach($allKanji as $kanji)
                <div class="inline-block bg-gray-300 px-1 m-1 rounded">
                    <a href="/kanji/edit/{{$kanji->symbol}}">{{$kanji->symbol}}</a>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <div>Words without reading or meaning</div>
            @foreach($wordsWithMissingData as $word)
                <div class="inline-block bg-gray-300 px-1 m-1 rounded">
                    <a href="/word/edit/{{$word->id}}">{{$word->word}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
