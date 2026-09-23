@extends('frontend.app')

@section('title', config('app.name').' — Home')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-4xl font-bold text-gray-900">Welcome</h1>
        <p class="mt-4 text-lg text-gray-600">
            The public frontend website of this application.
        </p>
    </section>
@endsection