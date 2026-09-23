@extends('frontend.app')

@section('title', $page->title.' — '.config('app.name'))

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900">{{ $page->title }}</h1>
        <div class="mt-6 prose max-w-none text-gray-700">
            {!! $page->content !!}
        </div>
    </section>
@endsection