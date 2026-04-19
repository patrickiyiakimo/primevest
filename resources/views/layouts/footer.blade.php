<!-- Footer -->
<footer class="bg-gray-900 pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Footer Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-8">
            
            <!-- MARKETS -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">MARKETS</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Forex</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Cryptos</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Shares</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Indices</a></li>
                </ul>
            </div>
            
            <!-- TRADING -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">TRADING</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Platform</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Pricing</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">PAMM</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Help Centre/FAQ</a></li>
                </ul>
            </div>
            
            <!-- COMPANY -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">COMPANY</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('company') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">About Us</a></li>
                    <li><a href="{{ route('company') }}#why-us" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Why Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- ACCOUNT -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">ACCOUNT</h3>
                <ul class="space-y-2">
                    @guest
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Sign Up</a></li>
                    @else
                        <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Dashboard</a></li>
                        <li><a href="{{ route('profile') }}" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
            
            <!-- LEGAL -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">LEGAL</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400 text-sm transition-colors duration-300">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Risk Warning -->
        <div class="border-t border-gray-800 pt-6 mb-6">
            <p class="text-gray-500 text-xs leading-relaxed">
                This website can be accessed worldwide however the information on the website is related to PrimeVest A/S and is not specific to any entity of PrimeVest. All clients will directly engage with PrimeVest A/S and all client agreements will be entered into with PrimeVest A/S.
            </p>
            <p class="text-gray-500 text-xs leading-relaxed mt-3">
                Forex and CFDs are leveraged products and can result in losses that exceed your deposits. Please ensure you fully understand all of the risks. Contracts for Difference ("CFDs") are leveraged products and carry a significant risk of loss to your capital, as prices may move rapidly against you and you may be required to make further payments to keep any trades open. These products are not suitable for all clients, therefore please ensure you fully understand the risks and seek independent advice.
            </p>
            <p class="text-gray-500 text-xs leading-relaxed mt-3">
                Apple and the Apple logo are trademarks of Apple Inc, registered in the US and other countries and regions. App Store is a service mark of Apple Inc. Google Play and the Google Play logo are trademarks of Google LLC.
            </p>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 pt-6 text-center">
            <p class="text-gray-500 text-xs">
                Copyright © {{ date('Y') }} PrimeVest. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<!-- Crypto Ticker Widget - No background, clean iframe -->
<iframe 
    src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" 
    width="100%" 
    height="45px" 
    scrolling="auto" 
    marginwidth="0" 
    marginheight="0" 
    frameborder="0" 
    border="0" 
    style="border:0;margin:0;padding:0;display:block;">
</iframe>