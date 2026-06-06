@extends('layouts.app')

@section('content')
    <!-- Trading Widget -->
    <!-- @include('components.trading-widget') -->

    <!-- Hero Section -->
    @include('pages.hero')
    
    <!-- Trading Widget -->
    @include('components.trading-widget')

    <!-- Trusted Brands Section -->
    @include('components.trusted-brands')

     <!-- case Studies -->
     @include('components.case-studies')

     <!-- top Rated -->
     @include('components.top-rated')

     <!-- Three Column Stats -->
     @include('components.three-column')

    <!-- Tradingview market-quotes Widget -->
    @include('components.tradingView-market')

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

   
    <!-- Exclusive Insights Section -->
    @include('components.exclusive-insights')
   
    @include('components.trade-from-any-device')

    @include('components.mt4-demo')
    
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

    <!-- cookies -->
    @include('components.cookies-consent')
@endsection
