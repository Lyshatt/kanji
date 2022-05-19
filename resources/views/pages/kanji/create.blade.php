@extends('templates.default')

@section('content')
    <h1 class="text-5xl text-center text-sky-900 mb-3">Create new Kanji</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/kanji/create" enctype="multipart/form-data">@csrf
        <div>
            <label for="symbol" class="block">Symbol</label>
            <input class="w-full" id="symbol" name="symbol" type="text" maxlength="1">
        </div>

        <div>
            <label for="meaning" class="block">Meaning</label>
            <textarea class="w-full" id="meaning" name="meaning" type="text"></textarea>
        </div>

        <div>
            <label for="mnemonic" class="block">Mnemonic</label>
            <textarea class="w-full" id="mnemonic" name="mnemonic" type="text"></textarea>
        </div>

        <div>
            <label for="readings" class="block">Kun-Readings</label>
            <input class="w-full" id="readings" name="readings" type="text">
        </div>

        <div>
            <label for="words" class="block">Words</label>
            <input class="w-full" id="words" name="words" type="text">
        </div>

        <div>
            <label for="tags" class="block">Tags</label>
            <input class="w-full" id="tags" name="tags" type="text">
        </div>

        <button class="mt-3 bg-sky-900 px-2 text-white rounded" type="submit">
            Submit
        </button>
    </form>
@endsection
