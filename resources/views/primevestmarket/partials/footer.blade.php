<footer class="bg-dark-400 text-gray-300">
        <!-- Upper Footer -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Company Info -->
                        <div>
                            <div class="flex items-center mb-6">
                                <a href="{{ route('home') }}" class="flex items-center">
                                    <img class="h-8 w-auto" src="{{ asset('images/logoipsum-409.png') }}" alt="PrimevestMarket">
                                </a>
                            </div>
                            <p class="text-sm text-gray-400 mb-6">
                                PrimevestMarket offers CFD trading on stocks, forex, indices, commodities, and cryptocurrencies with competitive spreads and advanced trading tools.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <span class="sr-only">Twitter</span>
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <span class="sr-only">LinkedIn</span>
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="mailto:support@primevestmarket.com" class="text-gray-400 hover:text-white">
                                    <span class="sr-only">Email</span>
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Quick Links</h3>
                            <ul class="space-y-3">
                                <li><a href="{{ route('about') }}" class="text-sm text-gray-400 hover:text-white transition">About Us</a></li>
                                <li><a href="{{ route('why-us') }}" class="text-sm text-gray-400 hover:text-white transition">Why Choose Us</a></li>
                                <li><a href="{{ route('for-traders') }}" class="text-sm text-gray-400 hover:text-white transition">Education</a></li>
                                <li><a href="{{ route('contacts') }}" class="text-sm text-gray-400 hover:text-white transition">Contact</a></li>
                            </ul>
                        </div>

                        <!-- Trading -->
                        <div>
                            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Trading</h3>
                            <ul class="space-y-3">
                                <li><a href="{{ route('cryptocurrencies') }}" class="text-sm text-gray-400 hover:text-white transition">Cryptocurrencies</a></li>
                                <li><a href="{{ route('forex') }}" class="text-sm text-gray-400 hover:text-white transition">Forex</a></li>
                                <li><a href="{{ route('shares') }}" class="text-sm text-gray-400 hover:text-white transition">Shares</a></li>
                                <li><a href="{{ route('indices') }}" class="text-sm text-gray-400 hover:text-white transition">Indices</a></li>
                            </ul>
                        </div>

                        <!-- Account -->
                        <div>
                            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Your Account</h3>
                            <ul class="space-y-3">
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Log In</a></li>
                                <li><a href="{{ route('register') }}" class="text-sm text-gray-400 hover:text-white transition">Create Account</a></li>
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Demo Account</a></li>
                                <li><a href="{{ route('contacts') }}" class="text-sm text-gray-400 hover:text-white transition">Help Center</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Platform Availability -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-6">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h4 class="text-sm font-semibold text-white">Available On</h4>
                        </div>
                        <div class="flex items-center space-x-6">
                            <a href="#" class="flex items-center text-gray-400 hover:text-white" aria-label="Web Platform">
                                <i class="fas fa-desktop mr-2"></i>
                                <span class="text-sm">Web</span>
                            </a>
                            <a href="#" class="flex items-center text-gray-400 hover:text-white" aria-label="Windows App">
                                <i class="fab fa-windows mr-2"></i>
                                <span class="text-sm">Windows</span>
                            </a>
                            <a href="#" class="flex items-center text-gray-400 hover:text-white" aria-label="Android App">
                                <i class="fab fa-android mr-2"></i>
                                <span class="text-sm">Android</span>
                            </a>
                            <a href="#" class="flex items-center text-gray-400 hover:text-white" aria-label="iOS App">
                                <i class="fab fa-apple mr-2"></i>
                                <span class="text-sm">iOS</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Disclaimer & Legal -->
        <div class="bg-dark-500 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-6">
                    <div class="text-xs text-gray-400">
                        <p class="mb-4 leading-relaxed">
                            <span class="font-semibold text-gray-300">RISK WARNING:</span> The Financial Products offered by the company include Contracts for Difference ('CFDs') and other complex financial products. Trading CFDs carries a high level
                            of risk since leverage can work both to your advantage and disadvantage. As a result, CFDs may not be suitable for all investors because it is possible to lose all of your invested capital. You should never invest money that
                            you cannot afford to lose. Before trading in the complex financial products offered, please ensure you understand the risks involved.
                        </p>
                        <div class="flex flex-wrap gap-4 mb-4">
                            <a href="{{ route('terms') }}" class="text-blue-400 hover:text-blue-300 transition">Terms & Conditions</a>
                            <a href="{{ route('privacy') }}" class="text-blue-400 hover:text-blue-300 transition">Privacy Policy</a>
                            <a href="{{ route('regulation') }}" class="text-blue-400 hover:text-blue-300 transition">Legal Documents</a>
                        </div>
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> PrimevestMarket. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gtranslate_wrapper"></div>
        <script>
            window.gtranslateSettings = {
                default_language: "en",
                alt_flags: {
                    "en": "usa"
                },
                wrapper_selector: ".gtranslate_wrapper",
                flag_style: "3d",
            };
        </script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>












    </footer>


    <style>
        .notification-popup {
            position: fixed;
            z-index: 1000;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 16px 20px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            max-width: 350px;
            min-width: 280px;
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .notification-popup.show {
            transform: translateX(0);
            opacity: 1;
        }
        
        .notification-popup .notification-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .notification-popup .notification-icon {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-size: 12px;
            color: #fff;
        }
        
        .notification-popup .notification-title {
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            opacity: 0.9;
        }
        
        .notification-popup .notification-content {
            color: #fff;
            font-size: 13px;
            line-height: 1.4;
            margin-bottom: 12px;
        }
        
        .notification-popup .notification-content b {
            font-weight: 700;
            color: #FFD700;
        }
        
        .notification-popup .notification-content a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s ease;
        }
        
        .notification-popup .notification-content a:hover {
            border-bottom-color: #FFD700;
        }
        
        .notification-popup .notification-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .notification-popup .notification-time {
            font-style: italic;
        }
        
        .notification-popup .notification-close {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            cursor: pointer;
            padding: 2px;
            border-radius: 3px;
            transition: color 0.2s ease;
        }
        
        .notification-popup .notification-close:hover {
            color: #fff;
        }
        
        .notification-popup .progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(255, 215, 0, 0.8);
            border-radius: 0 0 12px 12px;
            transition: width linear;
        }
        /* Dark mode adjustments */
        
        html.dark .notification-popup {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
            border-color: rgba(255, 255, 255, 0.1);
        }
        /* Mobile responsiveness */
        
        @media (max-width: 640px) {
            .notification-popup {
                right: 10px;
                bottom: 80px;
                max-width: calc(100vw - 20px);
                min-width: auto;
            }
        }
        /* Animation keyframes */
        
        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
        
        .notification-popup.animate-in {
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        .notification-popup.animate-out {
            animation: slideOutRight 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>

    <div class="notification-popup" id="tradingNotification" style="display: none;">
        <div class="notification-header">
            <div class="notification-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="notification-title">Live Trading Activity</div>
            <button class="notification-close ml-auto" onclick="closeNotification()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="notification-content" id="notificationText"></div>
        <div class="notification-footer">
            <span class="notification-time" id="notificationTime"></span>
            <span style="font-size: 10px;">🟢 Live</span>
        </div>
        <div class="progress-bar" id="progressBar"></div>
    </div>
    <script data-cfasync="false" src="#"></script>
    <script type="text/javascript">
        class TradingNotificationManager {
            constructor() {
                this.listCountries = [
                    'New York', 'London', 'Tokyo', 'Singapore', 'Frankfurt', 'Sydney', 'Dubai', 'Hong Kong',
                    'Toronto', 'Zurich', 'Paris', 'Amsterdam', 'Stockholm', 'Copenhagen', 'Milan', 'Madrid',
                    'Seoul', 'Mumbai', 'São Paulo', 'Mexico City', 'Buenos Aires', 'Cairo', 'Johannesburg',
                    'Moscow', 'Istanbul', 'Bangkok', 'Jakarta', 'Manila', 'Ho Chi Minh City', 'Kuala Lumpur',
                    'Tel Aviv', 'Warsaw', 'Prague', 'Budapest', 'Vienna', 'Brussels', 'Oslo', 'Helsinki',
                    'Dublin', 'Lisbon', 'Athens', 'Bucharest', 'Sofia', 'Zagreb', 'Sarajevo', 'Belgrade',
                    'Skopje', 'Podgorica', 'Tirana', 'Pristina'
                ];

                this.listAmounts = [
                    '$1,250', '$2,500', '$5,000', '$7,500', '$10,000', '$15,000', '$25,000', '$50,000',
                    '$75,000', '$100,000', '$150,000', '$200,000', '$3,450', '$8,900', '$12,340', '$18,750',
                    '$22,100', '$35,680', '$47,230', '$65,420', '$89,150', '$125,000', '$175,000', '$225,000'
                ];

                this.transactionTypes = [{
                    action: 'invested',
                    icon: 'fa-chart-line',
                    color: '#10B981'
                }, {
                    action: 'withdrawn',
                    icon: 'fa-money-bill-wave',
                    color: '#3B82F6'
                }, {
                    action: 'earned',
                    icon: 'fa-trophy',
                    color: '#F59E0B'
                }];

                this.instruments = [
                    'Bitcoin', 'Ethereum', 'Apple Stock', 'Tesla Stock', 'Gold', 'Oil', 'EUR/USD', 'GBP/USD',
                    'USD/JPY', 'AUD/USD', 'Nvidia Stock', 'Microsoft Stock', 'Amazon Stock', 'Google Stock',
                    'S&P 500', 'NASDAQ 100', 'Dow Jones', 'Silver', 'Crude Oil', 'Natural Gas'
                ];

                this.currentNotification = null;
                this.interval = null;
                this.isActive = true;
                this.displayDuration = 45000; // 45 seconds - much longer than before
                this.intervalRange = {
                    min: 8000,
                    max: 20000
                }; // 8-20 seconds between notifications

                this.init();
            }

            init() {
                this.scheduleNext();
            }

            getRandomElement(array) {
                return array[Math.floor(Math.random() * array.length)];
            }

            getRandomAmount() {
                return this.getRandomElement(this.listAmounts);
            }

            getRandomCountry() {
                return this.getRandomElement(this.listCountries);
            }

            getRandomTransaction() {
                return this.getRandomElement(this.transactionTypes);
            }

            getRandomInstrument() {
                return this.getRandomElement(this.instruments);
            }

            formatTime() {
                return new Date().toLocaleTimeString('en-US', {
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }

            createNotificationMessage() {
                const country = this.getRandomCountry();
                const transaction = this.getRandomTransaction();
                const amount = this.getRandomAmount();
                const instrument = this.getRandomInstrument();

                let message = '';

                switch (transaction.action) {
                    case 'invested':
                        message = `Trader from <b>${country}</b> just <b>invested</b> <a href="javascript:void(0);" onclick="javascript:void(0);">${amount}</a> in ${instrument}`;
                        break;
                    case 'withdrawn':
                        message = `Trader from <b>${country}</b> successfully <b>withdrew</b> <a href="javascript:void(0);" onclick="javascript:void(0);">${amount}</a> from their account`;
                        break;
                    case 'earned':
                        message = `Trader from <b>${country}</b> just <b>earned</b> <a href="javascript:void(0);" onclick="javascript:void(0);">${amount}</a> trading ${instrument}`;
                        break;
                }

                return {
                    message,
                    transaction
                };
            }

            showNotification() {
                if (!this.isActive) return;

                const notification = document.getElementById('tradingNotification');
                const textElement = document.getElementById('notificationText');
                const timeElement = document.getElementById('notificationTime');
                const progressBar = document.getElementById('progressBar');

                if (!notification || !textElement || !timeElement || !progressBar) return;

                const {
                    message,
                    transaction
                } = this.createNotificationMessage();

                // Update content
                textElement.innerHTML = message;
                timeElement.textContent = this.formatTime();

                // Update icon color based on transaction type
                const icon = notification.querySelector('.notification-icon');
                if (icon) {
                    icon.style.background = transaction.color + '40'; // 40 for opacity
                }

                // Show notification with animation
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.classList.add('show', 'animate-in');
                }, 100);

                // Progress bar animation
                progressBar.style.width = '100%';
                progressBar.style.transition = `width ${this.displayDuration}ms linear`;

                setTimeout(() => {
                    progressBar.style.width = '0%';
                }, 200);

                // Auto hide after display duration
                this.currentNotification = setTimeout(() => {
                    this.hideNotification();
                }, this.displayDuration);
            }

            hideNotification() {
                const notification = document.getElementById('tradingNotification');
                const progressBar = document.getElementById('progressBar');

                if (!notification) return;

                // Clear any existing timeout
                if (this.currentNotification) {
                    clearTimeout(this.currentNotification);
                    this.currentNotification = null;
                }

                // Hide with animation
                notification.classList.remove('animate-in');
                notification.classList.add('animate-out');

                setTimeout(() => {
                    notification.classList.remove('show', 'animate-out');
                    notification.style.display = 'none';

                    // Reset progress bar
                    progressBar.style.width = '100%';
                    progressBar.style.transition = 'none';

                    // Schedule next notification
                    this.scheduleNext();
                }, 300);
            }

            scheduleNext() {
                if (!this.isActive) return;

                const delay = Math.floor(
                    Math.random() * (this.intervalRange.max - this.intervalRange.min + 1) +
                    this.intervalRange.min
                );

                if (this.interval) {
                    clearTimeout(this.interval);
                }

                this.interval = setTimeout(() => {
                    this.showNotification();
                }, delay);
            }

            pause() {
                this.isActive = false;
                if (this.interval) {
                    clearTimeout(this.interval);
                    this.interval = null;
                }
                if (this.currentNotification) {
                    clearTimeout(this.currentNotification);
                    this.currentNotification = null;
                }
                this.hideNotification();
            }

            resume() {
                this.isActive = true;
                this.scheduleNext();
            }

            destroy() {
                this.pause();
                const notification = document.getElementById('tradingNotification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }
        }

        // Global functions for notification control
        function closeNotification() {
            if (window.tradingNotificationManager) {
                window.tradingNotificationManager.hideNotification();
            }
        }

        function pauseNotifications() {
            if (window.tradingNotificationManager) {
                window.tradingNotificationManager.pause();
            }
        }

        function resumeNotifications() {
            if (window.tradingNotificationManager) {
                window.tradingNotificationManager.resume();
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Small delay to ensure everything is loaded
            setTimeout(() => {
                window.tradingNotificationManager = new TradingNotificationManager();
            }, 500); // Reduced from 2000ms to 500ms
        });

        // Pause notifications when user is inactive
        let userActiveTimeout;

        function resetUserActiveTimer() {
            clearTimeout(userActiveTimeout);
            if (window.tradingNotificationManager && !window.tradingNotificationManager.isActive) {
                resumeNotifications();
            }

            userActiveTimeout = setTimeout(() => {
                pauseNotifications();
            }, 300000); // Pause after 5 minutes of inactivity
        }

        // Listen for user activity
        ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart', 'click'].forEach(event => {
            document.addEventListener(event, resetUserActiveTimer, true);
        });

        // Initialize user activity timer
        resetUserActiveTimer();
    </script>

    <!-- Live Chat Button -->













    <!-- GetButton.io widget -->
    <!--<script type="text/javascript">-->
    <!--    (function () {-->
    <!--        var options = {-->
    <!--whatsapp: "1234567890", // WhatsApp number-->
    <!--call_to_action: "Message us", // Call to action-->
    <!--button_color: "#FF6550", // Color of button-->
    <!--position: "right", // Position may be 'right' or 'left'-->
    <!--        };-->
    <!--        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;-->
    <!--        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';-->
    <!--        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };-->
    <!--        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);-->
    <!--    })();-->
    <!--</script>-->
    <!-- Additional Scripts -->
    <script>
        // Live Chat Function
        function openLiveChat(e) {
            e.preventDefault();
            console.log('Opening live chat...');
            // Implement your live chat functionality here
        }

        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize any custom components
            console.log('DOM loaded, initializing components...');
        });

        // Analytics (preserved from original)
        function bindGAEvents(eventCategory, callback, iter) {
            if (typeof iter === "undefined") {
                iter = 1;
            }
            if (window.dataLayer) {
                if (typeof callback === "function") {
                    callback();
                }
            } else if (iter > 2 && typeof callback === "function") {
                callback();
            } else {
                setTimeout(function() {
                    bindGAEvents(eventCategory, callback, iter + 1);
                }, 500);
            }
        }

        $(document).ready(function() {
            if ('' == '1') {
                bindGAEvents('ex_new_user');
            }

            $(document).on('click', '.start-trading, .open-live-account, .open-demo-account', function(event) {
                var redirectLink = $(this).attr('href');
                bindGAEvents('ex_button', function() {
                    window.location.href = redirectLink;
                });
                event.preventDefault();
            });
        });
    </script>














@include('partials.smartsupp')

</body>


</html>