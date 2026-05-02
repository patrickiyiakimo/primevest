<!-- Cookies Consent Modal -->
<div id="cookies-consent" class="fixed bottom-0 left-0 right-0 z-50 transform transition-transform duration-500 ease-in-out" style="transform: translateY(100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6">
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-5 sm:p-6">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <!-- Cookie Icon -->
                        <div class="w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold text-lg">Cookies & Privacy</h3>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        We use cookies to enhance your trading experience, analyze site traffic, 
                        and personalize content. By clicking "Accept", you consent to our use of cookies 
                        in accordance with our <a href="/privacy-policy" class="text-red-400 hover:text-red-300 underline transition">Privacy Policy</a>.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
                    <button id="decline-cookies" class="px-5 py-2.5 text-sm font-medium text-gray-300 hover:text-white bg-gray-700 hover:bg-gray-600 rounded-full transition-all duration-300">
                        Decline
                    </button>
                    <button id="accept-cookies" class="px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                        Accept Cookies
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Check if user has already accepted cookies
    function hasCookieConsent() {
        return localStorage.getItem('cookies_consent') === 'accepted';
    }
    
    function hasDeclinedCookies() {
        return localStorage.getItem('cookies_consent') === 'declined';
    }
    
    function showCookiesConsent() {
        const consentDiv = document.getElementById('cookies-consent');
        if (consentDiv) {
            consentDiv.style.transform = 'translateY(0)';
        }
    }
    
    function hideCookiesConsent() {
        const consentDiv = document.getElementById('cookies-consent');
        if (consentDiv) {
            consentDiv.style.transform = 'translateY(100%)';
        }
    }
    
    function acceptCookies() {
        localStorage.setItem('cookies_consent', 'accepted');
        hideCookiesConsent();
        
        // Optional: Enable analytics or tracking scripts here
        enableAnalytics();
        
        // Show success toast (optional)
        showToast('Cookies accepted', 'success');
    }
    
    function declineCookies() {
        localStorage.setItem('cookies_consent', 'declined');
        hideCookiesConsent();
        
        // Disable non-essential cookies/tracking
        disableAnalytics();
        
        // Show info toast (optional)
        showToast('You have declined non-essential cookies', 'info');
    }
    
    // Optional: Toast notification for user feedback
    function showToast(message, type = 'info') {
        // Check if toast container exists, create if not
        let toastContainer = document.getElementById('toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            toastContainer.className = 'fixed top-20 right-4 z-50 space-y-2';
            document.body.appendChild(toastContainer);
        }
        
        const toast = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-600' : 'bg-gray-800';
        toast.className = `${bgColor} text-white px-4 py-3 rounded-lg shadow-lg text-sm flex items-center gap-2 animate-slide-in`;
        toast.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            ${message}
        `;
        toastContainer.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(100px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    
    // Enable analytics/tracking (replace with your actual tracking code)
    function enableAnalytics() {
        console.log('Analytics enabled');
        // Example: Google Analytics
        // gtag('consent', 'update', {
        //     'analytics_storage': 'granted',
        //     'ad_storage': 'granted'
        // });
    }
    
    function disableAnalytics() {
        console.log('Analytics disabled');
        // Example: Google Analytics
        // gtag('consent', 'update', {
        //     'analytics_storage': 'denied',
        //     'ad_storage': 'denied'
        // });
    }
    
    // Initialize cookies consent
    document.addEventListener('DOMContentLoaded', function() {
        // Wait a moment before showing the banner (better UX)
        setTimeout(() => {
            if (!hasCookieConsent() && !hasDeclinedCookies()) {
                showCookiesConsent();
            }
        }, 1000);
        
        // Set up event listeners
        const acceptBtn = document.getElementById('accept-cookies');
        const declineBtn = document.getElementById('decline-cookies');
        
        if (acceptBtn) {
            acceptBtn.addEventListener('click', acceptCookies);
        }
        
        if (declineBtn) {
            declineBtn.addEventListener('click', declineCookies);
        }
    });
</script>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }
</style>