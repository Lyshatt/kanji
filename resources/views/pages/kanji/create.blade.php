@extends('templates.default')

@section('content')
    <h1 class="text-5xl text-center text-sky-900">Create new Kanji</h1>
    <form>
        <label for="symbol">Symbol</label>
        <input id="symbol" name="symbol" type="text" maxlength="1">
    </form>

{{--    protected $fillable = [--}}
{{--    'symbol',--}}
{{--    'meaning',--}}
{{--    'mnemonic'--}}
{{--    ];--}}

{{--    public function kunReadings()--}}
{{--    {--}}
{{--    return $this->hasMany(KunReading::class);--}}
{{--    }--}}

{{--    public function onReadings()--}}
{{--    {--}}
{{--    return $this->hasMany(OnReading::class);--}}
{{--    }--}}

{{--    public function words()--}}
{{--    {--}}
{{--    return $this->hasMany(Word::class);--}}
{{--    }--}}
@endsection
