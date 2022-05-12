@extends('templates.default')

@section('content')
    <form  method="post" action="/lesson" enctype="multipart/form-data">@csrf
        <div class="bg-white rounded shadow p-3 mb-4">
            <div class="text-sky-900 text-2xl mb-4">Select which Kanji you want to practise</div>

            <div class="flex">
                @foreach($tags as $tag)
                    <div class="tag-container w-1/6 pr-1">
                        <input class="cursor-pointer w-full p-2 text-xl rounded text-white bg-gray-500 caret-transparent text-center" name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->name}}" disabled>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <button class="bg-sky-800 py-3 px-4 rounded hover:bg-sky-900 text-white text-xl" type="submit">Übung starten -></button>
        </div>
    </form>

    <script>
        document.querySelectorAll('.tag-container').forEach(function (element){
            let input = element.querySelector('input');

            element.addEventListener('click', function () {
                input.disabled = !input.disabled;
                input.readonly = !input.readonly;

                if(input.disabled) {
                    input.classList.remove('bg-sky-900');
                    input.classList.add('bg-gray-500');
                } else if(input.readonly) {
                    input.classList.add('bg-sky-900');
                    input.classList.remove('bg-gray-500');
                }
            })
        });
    </script>

    <style>
    </style>
@endsection
