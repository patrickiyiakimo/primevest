<!-- Markets We Offer Section -->
<div class="bg-white py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Markets We Offer
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Diversify your portfolio across multiple asset classes
            </p>
        </div>
        
        <!-- Toggle Buttons -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex bg-gray-100 rounded-lg p-1">
                <button id="btn-markets" onclick="toggleMarkets('markets')" class="toggle-btn active px-6 py-2.5 text-sm font-semibold rounded-md transition-all duration-300">
                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Traditional Markets
                </button>
                <button id="btn-crypto" onclick="toggleMarkets('crypto')" class="toggle-btn px-6 py-2.5 text-sm font-semibold rounded-md transition-all duration-300">
                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Cryptocurrency
                </button>
            </div>
        </div>
        
        <!-- Traditional Markets Section -->
        <div id="markets-section" class="transition-all duration-300">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                
                <!-- Forex Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-red-600 flex items-center justify-center group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-white group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-white transition-all duration-300">Forex</h3>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Trade 70 major, minor & exotic currency pairs with competitive trading conditions.
                        </p>
                    </div>
                </div>
                
                <!-- Shares Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-red-600 flex items-center justify-center group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-white group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-white transition-all duration-300">Shares</h3>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Hundreds of public companies from the US, UK, Germany and more available to trade.
                        </p>
                    </div>
                </div>
                
                <!-- Energies Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-red-600 flex items-center justify-center group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-white group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-white transition-all duration-300">Energies</h3>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Discover opportunities on UK & US Crude Oil as well as Natural Gas.
                        </p>
                    </div>
                </div>
                
                <!-- Indices Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-red-600 flex items-center justify-center group-hover:bg-white transition-all duration-300">
                                <svg class="w-6 h-6 text-white group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-white transition-all duration-300">Indices</h3>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Trade major and minor Index CFDs from around the globe.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cryptocurrency Section -->
        <div id="crypto-section" class="transition-all duration-300" style="display: none;">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Bitcoin Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="{{ asset('images/btc.png') }}" alt="Bitcoin" class="w-16 h-16 group-hover:brightness-0 group-hover:invert transition-all duration-300">
                                </div>
                                <div>
                                    <h4 class="text-gray-800 font-bold text-lg group-hover:text-white transition-all duration-300">Bitcoin</h4>
                                    <p class="text-gray-400 text-xs group-hover:text-white/70 transition-all duration-300">BTC/USD</p>
                                </div>
                            </div>
                            <span class="text-green-600 text-sm font-semibold group-hover:text-green-300 transition-all duration-300">+2.34%</span>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 text-sm leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Bitcoin is a decentralized digital currency, without a central bank or single administrator, that can be sent from user to user on the peer-to-peer bitcoin network without the need for intermediaries.
                        </p>
                        <div class="mt-4 pt-2">
                            <a href="/trading" class="text-red-600 hover:text-red-700 text-sm font-semibold flex items-center group-hover:text-white transition-all duration-300">
                                Trade Bitcoin
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Ethereum Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="{{ asset('images/eth.png') }}" alt="Ethereum" class="w-16 h-16 group-hover:brightness-0 group-hover:invert transition-all duration-300">
                                </div>
                                <div>
                                    <h4 class="text-gray-800 font-bold text-lg group-hover:text-white transition-all duration-300">Ethereum</h4>
                                    <p class="text-gray-400 text-xs group-hover:text-white/70 transition-all duration-300">ETH/USD</p>
                                </div>
                            </div>
                            <span class="text-green-600 text-sm font-semibold group-hover:text-green-300 transition-all duration-300">+1.56%</span>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 text-sm leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Ethereum is a decentralized, open-source blockchain with smart contract functionality. Ether is the native cryptocurrency of the platform. After Bitcoin, it is the largest cryptocurrency by market capitalization.
                        </p>
                        <div class="mt-4 pt-2">
                            <a href="/trading" class="text-red-600 hover:text-red-700 text-sm font-semibold flex items-center group-hover:text-white transition-all duration-300">
                                Trade Ethereum
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Bitcoin Cash Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="{{ asset('images/bch.png') }}" alt="Bitcoin Cash" class="w-16 h-16 group-hover:brightness-0 group-hover:invert transition-all duration-300">
                                </div>
                                <div>
                                    <h4 class="text-gray-800 font-bold text-lg group-hover:text-white transition-all duration-300">Bitcoin Cash</h4>
                                    <p class="text-gray-400 text-xs group-hover:text-white/70 transition-all duration-300">BCH/USD</p>
                                </div>
                            </div>
                            <span class="text-red-600 text-sm font-semibold group-hover:text-red-300 transition-all duration-300">-0.45%</span>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 text-sm leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Bitcoin Cash is a cryptocurrency that is a fork of Bitcoin. Bitcoin Cash is a spin-off or altcoin that was created in 2017.
                        </p>
                        <div class="mt-4 pt-2">
                            <a href="/trading" class="text-red-600 hover:text-red-700 text-sm font-semibold flex items-center group-hover:text-white transition-all duration-300">
                                Trade Bitcoin Cash
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Dogecoin Card -->
                <div class="group border border-gray-200 overflow-hidden transition-all duration-300 hover:bg-red-600 hover:border-red-600 cursor-pointer">
                    <div class="p-5 transition-all duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="{{ asset('images/doge.png') }}" alt="Dogecoin" class="w-16 h-16 group-hover:brightness-0 group-hover:invert transition-all duration-300">
                                </div>
                                <div>
                                    <h4 class="text-gray-800 font-bold text-lg group-hover:text-white transition-all duration-300">Dogecoin</h4>
                                    <p class="text-gray-400 text-xs group-hover:text-white/70 transition-all duration-300">DOGE/USD</p>
                                </div>
                            </div>
                            <span class="text-green-600 text-sm font-semibold group-hover:text-green-300 transition-all duration-300">+5.67%</span>
                        </div>
                        <div class="border-t border-gray-200 mb-4 group-hover:border-white/30"></div>
                        <p class="text-gray-500 text-sm leading-relaxed group-hover:text-white/90 transition-all duration-300">
                            Dogecoin is a cryptocurrency created as a payment system as a joke, making fun of the wild speculation in cryptocurrencies at the time.
                        </p>
                        <div class="mt-4 pt-2">
                            <a href="/trading" class="text-red-600 hover:text-red-700 text-sm font-semibold flex items-center group-hover:text-white transition-all duration-300">
                                Trade Dogecoin
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                Start Trading Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
    function toggleMarkets(type) {
        const marketsSection = document.getElementById('markets-section');
        const cryptoSection = document.getElementById('crypto-section');
        const btnMarkets = document.getElementById('btn-markets');
        const btnCrypto = document.getElementById('btn-crypto');
        
        if (type === 'markets') {
            marketsSection.style.display = 'block';
            cryptoSection.style.display = 'none';
            btnMarkets.classList.add('active', 'bg-red-600', 'text-white');
            btnMarkets.classList.remove('bg-gray-100', 'text-gray-700');
            btnCrypto.classList.remove('active', 'bg-red-600', 'text-white');
            btnCrypto.classList.add('bg-gray-100', 'text-gray-700');
        } else {
            marketsSection.style.display = 'none';
            cryptoSection.style.display = 'block';
            btnCrypto.classList.add('active', 'bg-red-600', 'text-white');
            btnCrypto.classList.remove('bg-gray-100', 'text-gray-700');
            btnMarkets.classList.remove('active', 'bg-red-600', 'text-white');
            btnMarkets.classList.add('bg-gray-100', 'text-gray-700');
        }
    }
</script>

<style>
    .toggle-btn {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .toggle-btn.active {
        background-color: #dc2626;
        color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .group:hover .group-hover\:brightness-0 {
        filter: brightness(0);
    }
    
    .group:hover .group-hover\:invert {
        filter: invert(1);
    }
</style>