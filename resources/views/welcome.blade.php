@extends('layouts.app')

@section('content')
<div x-data="{ open: false }">
    <button @click="open = ! open">Toggle</button>

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        Hello 👋
    </div>
</div>
@endsection