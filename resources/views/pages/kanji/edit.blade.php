@extends('templates.default')

@section('content')
    <h1 class="text-5xl text-center text-sky-900 mb-3">Edit {{$kanji->symbol}}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/kanji/edit/{{$kanji->symbol}}" enctype="multipart/form-data">@csrf
        <div>
            <label for="onmeaning" class="block">On-Meaning</label>
            <textarea class="w-full" id="onmeaning" name="onmeaning" type="text">{{$kanji->on_meaning}}</textarea>
        </div>

        <div>
            <label for="kunmeaning" class="block">Kun-Meaning</label>
            <textarea class="w-full" id="kunmeaning" name="kunmeaning" type="text">{{$kanji->kun_meaning}}</textarea>
        </div>

        <div>
            <label for="mnemonic" class="block">Mnemonic</label>
            <textarea class="w-full" id="mnemonic" name="mnemonic" type="text">{{$kanji->mnemonic}}</textarea>
        </div>

        <div>
            <label for="readings" class="block">Readings</label>
            <input class="w-full" id="readings" name="readings" type="text" value="@foreach($kanji->readings as $reading){{$reading->reading}}{{$loop->last ? '':','}}@endforeach">
        </div>

        <div>
            <label for="words" class="block">Words</label>
            <input class="w-full" id="words" name="words" type="text" value="@foreach($kanji->words as $word){{$word->word}}{{$loop->last ? '':','}}@endforeach">
        </div>

        <div>
            <label for="tags" class="block">Tags</label>
            <input class="w-full" id="tags" name="tags" type="text" value="@foreach($kanji->tags as $tag){{$tag->name}}{{$loop->last ? '':','}}@endforeach">
        </div>

        <button class="mt-3 bg-sky-900 px-2 text-white rounded" type="submit">
            Submit
        </button>
    </form>
@endsection
