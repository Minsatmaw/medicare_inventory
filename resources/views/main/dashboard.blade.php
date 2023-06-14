@extends('main.master')

@section('body')
    I'm Dashboard

    <div x-data="{ open: false }">
        <button @click="open = ! open">Expand</button>

        <div x-show="open">
            Content...
        </div>
    </div>
@endsection
