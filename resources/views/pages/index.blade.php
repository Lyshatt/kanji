@extends('templates.default')

@section('content')
    <h1 class="text-7xl text-center text-sky-900">Kanji</h1>
    <form method="post" action="/lesson" enctype="multipart/form-data">@csrf
        @foreach($tags as $tag)
            <div class="tag-container">
                <input name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->name}}" disabled>
            </div>
        @endforeach
        <button type="submit">Übung starten</button>
    </form>

    <script>
        document.querySelectorAll('.tag-container').forEach(function (element){

            element.addEventListener('click', function () {
                let input = element.querySelector('input');

                input.disabled = !input.disabled;
                input.readonly = !input.readonly;
            })
        });
    </script>
@endsection
