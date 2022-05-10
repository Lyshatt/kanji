@extends('templates.default')

@section('content')
    <h1 class="text-5xl text-center text-sky-900">Create new Kanji</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/kanji/store" enctype="multipart/form-data">@csrf
        <div>
            <label for="symbol" class="block">Symbol</label>
            <input id="symbol" name="symbol" type="text" maxlength="1">
        </div>

        <div>
            <label for="meaning" class="block">Meaning</label>
            <textarea id="meaning" name="meaning" type="text"></textarea>
        </div>

        <div>
            <label for="mnemonic" class="block">Mnemonic</label>
            <textarea id="mnemonic" name="mnemonic" type="text"></textarea>
        </div>

        <div>
            <label for="kunreadings" class="block">Kun-Readings</label>
            <input id="kunreadings" name="kunreadings" type="text">
        </div>

        <div>
            <label for="onreadings" class="block">On-Readings</label>
            <input id="onreadings" name="onreadings" type="text">
        </div>

        <div>
            <label for="words" class="block">Words</label>
            <input id="words" name="words" type="text">
        </div>

        <div>
            <label for="tags" class="block">Tags</label>
            <input id="tags" name="tags" type="text">
        </div>

        <button type="submit">
            Submit
        </button>
    </form>
@endsection
