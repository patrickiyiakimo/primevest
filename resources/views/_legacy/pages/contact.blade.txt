@extends('layouts.app')

@section('title', 'Contact Us')
@section('content')

<!-- Hero Section - Same Design as Homepage -->
<div class="relative min-h-[500px] sm:min-h-[500px] md:min-h-[600px] overflow-hidden bg-white">
    
    <!-- Red Gradient Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-red-500 via-red-200 to-transparent rounded-full opacity-60"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-400 via-red-200 to-transparent rounded-full opacity-60"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-red-50/30 via-transparent to-red-50/30 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-[500px] sm:min-h-[500px] md:min-h-[600px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center px-3 py-1 bg-red-100 mb-6">
                        <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                        <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Get in Touch</span>
                    </div>
                    
                    <h1 class="text-2xl sm:text-4xl md:text-4xl lg:text-4xl xl:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        HOW CAN WE <span class="text-red-600">HELP?</span>
                    </h1>
                    
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Our dedicated support team is ready to assist you with any questions or concerns.
                    </p>

                    <!-- Trust Indicators -->
                    <div class="mt-10 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center lg:justify-start">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">24/7 Support</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Quick Response</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Expert Team</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Image with Zoom on Hover -->
                <div class="flex justify-center lg:justify-end relative">
                    <div class="w-full overflow-hidden ">
                        <img src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?w=800&h=600&fit=crop" 
                             alt="Customer Support Team" 
                             class="w-full h-auto object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Contact Content -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Left Column - Email Section -->
            <div>
                <div class="bg-gray-50 border border-gray-100 p-8 mb-8">
                    <div class="w-14 h-14 bg-red-100 flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">SEND A MESSAGE TO</h2>
                    <a href="mailto:support@primevest.com" class="text-2xl lg:text-3xl font-semibold text-red-600 hover:text-red-700 transition-colors duration-300 break-all">
                        support@primevest.com
                    </a>
                    <p class="text-gray-500 text-sm mt-4">We typically respond within 24 hours</p>
                </div>
            </div>

            <!-- Right Column - Contact Details -->
            <div class="space-y-6">
                
                <!-- General Enquiries Card -->
                <div class="bg-gray-50 border border-gray-100 p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">General Enquiries</h3>
                            <a href="mailto:enquiries@primevest.com" class="text-red-600 hover:text-red-700 transition-colors duration-300 break-all">
                                enquiries@primevest.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="bg-gray-50 border border-gray-100 p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m0 5.656l3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Support</h3>
                            <a href="mailto:support@primevest.com" class="text-red-600 hover:text-red-700 transition-colors duration-300 break-all">
                                support@primevest.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="bg-gray-50 border border-gray-100 p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Phone</h3>
                            <a href="tel:+15206125104" class="text-xl font-semibold text-red-600 hover:text-red-700 transition-colors duration-300">
                                +1 (520) 612 - 5104
                            </a>
                            <p class="text-xs text-gray-500 mt-2">Monday - Friday, 9:00 - 18:00 GMT</p>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="bg-gray-50 border border-gray-100 p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">PrimeVest Address</h3>
                            <p class="text-gray-600 leading-relaxed">
                                1017 Centre Road Suite 300 A,<br>
                                Florida 34761, USA
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="h-96 w-full">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.885215359433!2d-81.426386!3d28.520809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e77e8c9f5c5c5d%3A0x8f5c5c5c5c5c5c5c!2s1017%20Centre%20Rd%20Suite%20300%20A%2C%20Orlando%2C%20FL%2034761!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<!-- CTA Section -->
<div class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl lg:text-3xl font-bold text-white mb-4">Ready to start trading?</h2>
        <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
            Join PrimeVest today and experience premium trading conditions
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-lg hover:shadow-xl">
            Open an Account
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
</div>

<style>
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Hover effect for button icon */
    .group-hover\:translate-x-1:hover {
        transform: translateX(4px);
    }
    
    /* Custom blur utilities */
    .blur-3xl {
        filter: blur(64px);
    }
    
    .blur-2xl {
        filter: blur(40px);
    }
</style>
@endsection