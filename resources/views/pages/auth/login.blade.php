@extends('templates.default')

@section('content')
    <div class="container">
        <div class="text-lg text-center mb-1">Admin section</div>
        <div class="flex justify-center">
            <div class="bg-white shadow p-3" style="width: 400px;">
                <form method="POST" action="/login">@csrf
                    <div class="flex mb-2">
                        <div class="w-1/2 pr-1">
                            <label class="block mb-2 text-right" for="email">E-Mail</label>
                            <label class="block text-right" for="password">Password</label>

                        </div>
                        <div class="w-1/2 pl-1">
                            <input class="mb-2 block" id="email" type="email" name="email" required>
                            <input class="block" id="password" type="password" name="password" required>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-sky-900 py-1 px-2 text-white rounded btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
