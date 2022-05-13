@extends('templates.default')

@section('content')
    <h1 class="text-5xl text-center text-sky-900 mb-3">Edit {{$word->word}}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/word/edit/{{$word->id}}" enctype="multipart/form-data">@csrf
        <div>
            <label for="meaning" class="block">Meaning</label>
            <textarea class="w-full" id="meaning" name="meaning" type="text">{{$word->meaning}}</textarea>
        </div>

        <div>
            <label for="reading" class="block">Mnemonic</label>
            <textarea class="w-full" id="reading" name="reading" type="text">{{$word->reading}}</textarea>
        </div>

        <button class="mt-3 bg-sky-900 px-2 text-white rounded" type="submit">
            Submit
        </button>
    </form>
@endsection
