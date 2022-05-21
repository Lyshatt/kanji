@extends('templates.default')

@section('content')
    <div class="flex justify-center">
        <div class=" bg-white rounded p-3 shadow" style="width: 500px;">
            <p>This is a simple, privately developed website that can be used to learn and review japanese kanji.</p>
            <br>
            <p>This website does not track or save any user data.</p>
            <br>
            <p>Open source data from the following sources is used:</p>
            <p><span>Kanji Data:</span> <a class="text-sky-900 font-bold" href="https://www.kanjidatabase.com/">www.kanjidatabase.com</a></p>
            <p><span>Word data:</span> <a class="text-sky-900 font-bold" href="https://www.jisho.org/">jisho.org</a></p>
            <br>
            <p>You can contact me through <a class="text-sky-900 font-bold" href="mailto:thomas.meichelboeck@gmail.com">thomas.meichelboeck@gmail.com</a></p>
        </div>
    </div>
@endsection
