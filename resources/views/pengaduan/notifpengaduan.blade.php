@extends('user')
@section('content')

<div class="container" style="margin-top: 2em;">
    <div class="alert {{ $alertClass }}" role="alert">
        {{ $message }}
    </div>
</div>

@endsection
