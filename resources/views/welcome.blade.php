@extends('layouts.app')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Welcome to PrimeVest</h1>
            <p class="text-xl text-gray-600 mb-8">Your Trusted Investment Partner</p>
            @guest
                <div class="space-x-4">
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg">Get Started</a>
                    <a href="{{ route('login') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg">Login</a>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection