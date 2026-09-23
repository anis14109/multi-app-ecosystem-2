<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="shrink-0">
                <a href="{{ route('frontend.home') }}" class="text-lg font-semibold text-gray-800">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="hidden sm:flex sm:space-x-8">
                <a href="{{ route('frontend.home') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Home</a>
                <a href="{{ route('frontend.about') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">About</a>
                <a href="{{ route('frontend.notice.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Notice</a>
                <a href="{{ route('frontend.gallery.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Gallery</a>
                <a href="{{ route('frontend.contact') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Contact</a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        {{ __('Dashboard') }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        {{ __('Log in') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 rounded-md px-3 py-2">
                            {{ __('Register') }}
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>