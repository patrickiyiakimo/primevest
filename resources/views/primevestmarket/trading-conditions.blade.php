@extends('primevestmarket.layouts.app')

@section('title', 'Trading Conditions | PrimevestMarket')

@section('content')


        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800">
            <!-- Abstract Background Elements -->
            <div class="absolute inset-0 z-20 md:z-0 pointer-events-none">
                <div class="absolute top-0 left-0 w-full h-full opacity-60 md:opacity-20">
                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%">
                        <stop stop-color="#3B82F6" stop-opacity=".25" offset="0%"/>
                        <stop stop-color="#10B981" stop-opacity=".2" offset="100%"/>
                    </linearGradient>
                </defs>
                <path fill="url(#a)" d="M400,115 C515.46,115 615,214.54 615,330 C615,445.46 515.46,545 400,545 C284.54,545 185,445.46 185,330 C185,214.54 284.54,115 400,115 Z" transform="translate(0 -50)" />
                <path fill="url(#a)" d="M400,115 C515.46,115 615,214.54 615,330 C615,445.46 515.46,545 400,545 C284.54,545 185,445.46 185,330 C185,214.54 284.54,115 400,115 Z" transform="translate(350 150)" />
            </svg>
                </div>
                <div class="absolute bottom-0 right-0 w-full h-full opacity-50 md:opacity-10">
                    <svg width="100%" height="100%" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#6366F1" stroke-width="2">
                    <path d="M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764"/>
                    <path d="M-4 44L190 190 731 737 520 660 309 538 40 599 295 764"/>
                    <path d="M-4 44L190 190 731 737M490 85L309 538 40 599 295 764"/>
                    <path d="M733 738L520 660M603 493L731 737M520 660L309 538"/>
                </g>
            </svg>
                </div>
            </div>

            <!-- Hero Content -->
            <div class="relative z-10 px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-blue-400 uppercase bg-blue-900 bg-opacity-30 rounded-full">
                        Platform Documentation
                    </div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl md:text-5xl">
                        <span class="block">Trading Conditions</span>
                        <span class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-400">Spreads, Leverage &amp; Margin</span>
                    </h1>
                    <p class="max-w-2xl mt-5 mx-auto text-xl text-gray-300">
                        Everything you need to know about spreads, leverage, commissions and margin requirements
                    </p>
                </div>
            </div>
        </section>

        <!-- Trading Conditions Content -->
        <section class="py-12 bg-gray-900">
            <div class="container max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gray-800 bg-opacity-70 backdrop-blur-sm rounded-2xl border border-gray-700 shadow-xl overflow-hidden">
                    <div class="p-6 md:p-10">
                        <div class="prose prose-lg prose-invert max-w-none">
                            <div class="space-y-8">

                                <div>
                                    <p class="text-gray-400 text-sm mb-6">Last updated: January 2026</p>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Overview</h2>
                                    <p class="text-gray-300 mb-4">
                                        This page sets out the trading conditions applicable to the instruments available on the PrimevestMarket platform. The figures shown are indicative and may vary according to market conditions, account type and instrument. Always review the conditions in the platform before placing a trade.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Indicative Trading Conditions</h2>
                                    <div class="not-prose overflow-x-auto rounded-xl border border-gray-700">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead class="bg-gray-900">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Symbol</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Typical Spread</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Leverage</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Commission</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Min Trade Size</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-gray-800 divide-y divide-gray-700 text-gray-200">
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">EUR/USD</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.2 pips</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:500</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">GBP/USD</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.4 pips</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:500</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">USD/JPY</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.4 pips</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:500</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">XAU/USD (Gold)</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.3</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:200</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">USOIL</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.03</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:100</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">US30</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">2.0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:200</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.1 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">NAS100</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1.6</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:200</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.1 lot</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">AAPL</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.08</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:20</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1 share</td>
                                                </tr>
                                                <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                                    <td class="px-6 py-4 whitespace-nowrap">BTC/USD</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">40.0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">1:20</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">0.01 lot</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Leverage and Margin</h2>
                                    <p class="text-gray-300 mb-4">
                                        Leverage allows you to control a position larger than the funds in your account. While leverage can amplify profits, it can equally amplify losses. Your margin requirement is the amount of funds that must be available in your account to open and maintain a position.
                                    </p>
                                    <p class="text-gray-300 mb-4">
                                        If the equity in your account falls below the required margin level, we may issue a margin call or automatically close one or more of your positions to prevent further losses.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Spreads and Commissions</h2>
                                    <p class="text-gray-300 mb-4">
                                        A spread is the difference between the bid and the ask price of an instrument and is the primary cost of trading on our platform. Spreads are variable and are influenced by liquidity, volatility and market hours. Certain account types may also attract a per-lot commission, which is displayed clearly before you confirm a trade.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Financing (Overnight Swaps)</h2>
                                    <p class="text-gray-300 mb-4">
                                        Positions held overnight may be subject to a financing charge, also known as a swap. Swaps are calculated based on the size of your position, the applicable interest rate differential and whether your position is long or short, and are credited or debited to your account daily.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Order Types</h2>
                                    <ul class="list-disc pl-6 text-gray-300 space-y-2 mb-6">
                                        <li><span class="text-white font-medium">Market Order:</span> executed immediately at the best available price.</li>
                                        <li><span class="text-white font-medium">Limit Order:</span> executed at a specified price or better.</li>
                                        <li><span class="text-white font-medium">Stop Order:</span> triggered when the market reaches a specified price.</li>
                                        <li><span class="text-white font-medium">Stop Loss:</span> designed to limit losses by closing a position at a predetermined level.</li>
                                        <li><span class="text-white font-medium">Take Profit:</span> designed to secure profits by closing a position at a target level.</li>
                                    </ul>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Trading Hours</h2>
                                    <p class="text-gray-300 mb-4">
                                        Trading hours vary by instrument and follow the schedules of the relevant underlying exchanges and markets. Forex and cryptocurrency markets trade around the clock on business days, while shares and indices are available during their respective exchange sessions. Holiday schedules may differ.
                                    </p>
                                </div>

                                <div>
                                    <h2 class="text-2xl font-bold text-blue-400 mb-4">Important Notice</h2>
                                    <p class="text-gray-300 mb-4">
                                        The conditions shown above are indicative and subject to change without notice. Please refer to the live conditions within the trading platform, and review our <a href="{{ route('terms') }}" class="text-blue-400 hover:text-blue-300">Terms &amp; Conditions</a> for the full terms governing your account.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="mt-12 text-center">
                            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Create Account
                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('terms') }}" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">Terms &amp; Conditions</h3>
                        <p class="text-gray-400">The full user agreement</p>
                    </a>
                    <a href="{{ route('forex') }}" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">Markets</h3>
                        <p class="text-gray-400">Explore the markets we offer</p>
                    </a>
                    <a href="{{ route('contacts') }}" class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 rounded-xl border border-gray-700 hover:border-blue-500 transition-colors duration-300 group">
                        <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400">Contact Us</h3>
                        <p class="text-gray-400">Questions about trading conditions? Get in touch</p>
                    </a>
                </div>
            </div>
        </section>


@endsection
