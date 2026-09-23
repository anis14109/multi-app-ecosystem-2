@extends('frontend.app')

@section('title', 'Notice Board — '.config('app.name'))

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">Notice Board</h1>
        <p class="mt-4 text-gray-600">Recent notices will be listed here.</p>
    </section>
@endsection