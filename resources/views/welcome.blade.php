@extends('layouts.app')

@section('content')
    <!-- Trading Widget -->
    <!-- @include('components.trading-widget') -->

    <!-- Hero Section -->
    @include('pages.hero')
    
    <!-- Trading Widget -->
    @include('components.trading-widget')

    <!-- Features Section -->
    @include('components.features-section')

    <!-- Award Section -->
    @include('components.awards')

    <!-- Industry prices Section -->
    @include('components.industry-prices')

    <!-- market-quotes Widget -->
    @include('components.market-quotes-widget')

    <!-- Trade Section -->
     @include('components.trade-section')

     <!-- Markets-Widget Section -->
     @include('components.markets-widget')

     <!-- case Studies -->
     @include('components.case-studies')

    <!-- Exclusive Insights Section -->
    @include('components.exclusive-insights')
    
    <!-- Markets We Offer Section -->
    @include('components.markets-we-offer')
    
    @include('components.mt4-demo')

    @include('components.trade-from-any-device')

    
    <!-- Trading Features Section -->
    @include('components.trading-features')
    
    <!-- Copy Trading Features Section -->
    @include('components.copy-trading-features')
    
    <!-- About Us Section -->
    @include('components.about-us')
    
    <!-- Investment Plans Section -->
    @include('components.investment-plans')

    <!-- Testimonials Section -->
    @include('components.testimonials')

    <!-- Trusted Section -->
    @include('components.trusted-section')

    <!-- global Opportunities -->
    @include('components.global-opportunities')

    <!-- How It Works Section -->
    @include('components.how-it-works')

    <!-- cookies -->
    @include('components.cookies-consent')
@endsection
