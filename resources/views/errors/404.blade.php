@extends('primevestmarket.layouts.app')

@section('title', 'Page Not Found | PrimevestMarket')

@section('content')
<section class="py-20 md:py-28 bg-dark-400 min-h-[70vh] flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-7xl md:text-9xl font-extrabold text-primary leading-none tracking-tight">404</p>
        <h1 class="mt-4 text-3xl md:text-4xl font-bold text-white">Page not found</h1>
        <p class="mt-4 text-gray-400 max-w-xl mx-auto">
            The page you're looking for doesn't exist, has been moved, or is temporarily unavailable.
        </p>

        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md text-sm font-semibold transition-colors">
                <i class="fas fa-home mr-2"></i> Back to Home
            </a>
            <a href="{{ route('contacts') }}" class="inline-flex items-center justify-center bg-dark-100 hover:bg-dark-200 text-gray-200 px-6 py-3 rounded-md text-sm font-semibold transition-colors">
                <i class="fas fa-headset mr-2"></i> Contact Support
            </a>
        </div>

        <div class="mt-10 text-sm text-gray-500">
            <span class="mr-2">Popular pages:</span>
            <a href="{{ route('cryptocurrencies') }}" class="text-primary hover:underline mx-1">Cryptocurrencies</a>
            <a href="{{ route('forex') }}" class="text-primary hover:underline mx-1">Forex</a>
            <a href="{{ route('shares') }}" class="text-primary hover:underline mx-1">Shares</a>
            <a href="{{ route('trade') }}" class="text-primary hover:underline mx-1">Trade</a>
            <a href="{{ route('faq') }}" class="text-primary hover:underline mx-1">FAQ</a>
        </div>
    </div>
</section>
@endsection
