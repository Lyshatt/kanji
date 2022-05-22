@extends('templates.default')

@section('content')
    <div class="text-xs mb-1 text-gray-500"> Welcome. This is a tiny application to review kanji.</div>
    <form  method="post" action="/lesson" enctype="multipart/form-data">@csrf
        <div class="bg-white rounded shadow p-3 mb-4">
            <div class="text-sky-900 text-2xl mb-4">Select which kanji you want to practice.</div>

            <div>
                @foreach($tags as $tag)
                    <div class="tag-container pr-1 inline-block mb-1">
                        <input class="hidden" size="5" name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->name}}" disabled>
                        <button style="width: 100px;" type="button" class="cursor-pointer w-full p-2 rounded text-white bg-gray-500 caret-transparent text-center">{{$tag->name}}</button>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <button class="bg-sky-800 py-3 px-4 rounded hover:bg-sky-900 text-white text-md flex items-center" type="submit">
                <div class="mr-1">Start lesson</div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            @if($errors->any())
                <div class="text-red-900 mt-2 p-2 bg-red-100">{{$errors->first()}}</div>
            @endif
        </div>
    </form>

    <script>
        document.querySelectorAll('.tag-container').forEach(function (element){
            let input = element.querySelector('input');
            let button = element.querySelector('button');

            button.addEventListener('click', function () {
                input.disabled = !input.disabled;
                input.readonly = !input.readonly;

                if(input.disabled) {
                    button.classList.remove('bg-sky-900');
                    button.classList.add('bg-gray-500');
                } else if(input.readonly) {
                    button.classList.add('bg-sky-900');
                    button.classList.remove('bg-gray-500');
                }
            })
        });
    </script>

    <style>
    </style>
@endsection
