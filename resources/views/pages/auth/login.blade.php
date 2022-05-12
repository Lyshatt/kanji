@extends('templates.default')

@section('content')
    <div class="container">
        <form method="POST" action="/login">@csrf
            <label for="email">E-Mail</label>
            <input id="email" type="email" name="email" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
