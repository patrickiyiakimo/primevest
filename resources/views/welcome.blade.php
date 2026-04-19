@extends('layouts.app')

@section('content')
    <!-- Trading Widget -->
    <!-- @include('components.trading-widget') -->

    <!-- Hero Section -->
    @include('pages.hero')
    
    <!-- Trading Widget -->
    <!-- @include('components.trading-widget') -->
    
    <!-- Features Section -->
    @include('components.features-section')
    
    <!-- Exclusive Insights Section -->
    @include('components.exclusive-insights')
    
    <!-- Markets We Offer Section -->
    @include('components.markets-we-offer')
    
    <!-- Learn Bitcoin Section -->
    @include('components.learn-bitcoin')
    
    <!-- Trading Features Section -->
    @include('components.trading-features')
    
    <!-- Copy Trading Features Section -->
    @include('components.copy-trading-features')
    
    <!-- About Us Section -->
    @include('components.about-us')
    
    <!-- Investment Plans Section -->
    @include('components.investment-plans')
@endsection
