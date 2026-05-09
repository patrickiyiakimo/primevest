<!-- Cookies Consent Modal -->
<div id="cookies-consent" class="fixed inset-0 z-50 flex items-center justify-center transition-all duration-500 ease-in-out" style="display: none; opacity: 0;">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" id="cookies-backdrop"></div>
    
    <!-- Modal -->
    <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-500 scale-95 opacity-0" id="cookies-modal">
        
        <!-- Decorative Top Bar -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 via-red-600 to-red-700 rounded-t-2xl"></div>
        
        <!-- Close Button -->
        <button id="decline-cookies" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <div class="p-6 pt-8">
            <!-- Icon -->
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center shadow-inner">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">
                Cookies & Privacy
            </h2>
            
            <p class="text-sm text-gray-500 text-center mb-6">
                We value your privacy
            </p>
            
            <!-- Description -->
            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <p class="text-gray-600 text-sm leading-relaxed">
                    We use cookies to enhance your trading experience, analyze site traffic, 
                    and personalize content. Your privacy is important to us.
                </p>
            </div>
            
            <!-- Cookie Preferences List -->
            <div class="space-y-3 mb-6">
                <!-- Essential Cookies -->
                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Essential Cookies</p>
                            <p class="text-xs text-gray-400">Required for the website to function</p>
                        </div>
                    </div>
                    <div class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                        Always Active
                    </div>
                </div>
                
                <!-- Analytics Cookies -->
                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Analytics Cookies</p>
                            <p class="text-xs text-gray-400">Help us improve our platform</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="analytics-cookies" class="sr-only peer">
                        <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-red-600"></div>
                    </label>
                </div>
                
                <!-- Marketing Cookies -->
                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Marketing Cookies</p>
                            <p class="text-xs text-gray-400">Personalize your experience</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="marketing-cookies" class="sr-only peer">
                        <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-red-600"></div>
                    </label>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col gap-3">
                <button id="accept-cookies" class="w-full py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                    Accept All Cookies
                </button>
                
                <button id="save-preferences" class="w-full py-3 bg-white border-2 border-gray-200 hover:border-red-200 text-gray-700 hover:text-red-600 font-semibold rounded-xl transition-all duration-300">
                    Save My Preferences
                </button>
            </div>
            
            <!-- Footer Links -->
            <div class="text-center mt-6">
                <a href="/privacy-policy" class="text-xs text-gray-400 hover:text-red-500 transition-colors duration-200">
                    Read our Privacy Policy
                </a>
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
    
    function hasPreferencesSaved() {
        return localStorage.getItem('cookies_preferences') !== null;
    }
    
    function showCookiesConsent() {
        const modal = document.getElementById('cookies-consent');
        const modalContent = document.getElementById('cookies-modal');
        
        if (modal) {
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.style.opacity = '1';
                if (modalContent) {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }
            }, 50);
        }
    }
    
    function hideCookiesConsent() {
        const modal = document.getElementById('cookies-consent');
        const modalContent = document.getElementById('cookies-modal');
        
        if (modalContent) {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
        }
        
        setTimeout(() => {
            if (modal) {
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }
        }, 200);
    }
    
    function acceptCookies() {
        localStorage.setItem('cookies_consent', 'accepted');
        localStorage.setItem('cookies_preferences', JSON.stringify({
            analytics: true,
            marketing: true
        }));
        hideCookiesConsent();
        enableAnalytics();
        enableMarketing();
        showToast('All cookies accepted', 'success');
    }
    
    function savePreferences() {
        const analyticsChecked = document.getElementById('analytics-cookies')?.checked || false;
        const marketingChecked = document.getElementById('marketing-cookies')?.checked || false;
        
        localStorage.setItem('cookies_consent', 'preferences');
        localStorage.setItem('cookies_preferences', JSON.stringify({
            analytics: analyticsChecked,
            marketing: marketingChecked
        }));
        hideCookiesConsent();
        
        if (analyticsChecked) enableAnalytics();
        else disableAnalytics();
        
        if (marketingChecked) enableMarketing();
        else disableMarketing();
        
        showToast('Preferences saved', 'info');
    }
    
    function declineCookies() {
        localStorage.setItem('cookies_consent', 'declined');
        localStorage.setItem('cookies_preferences', JSON.stringify({
            analytics: false,
            marketing: false
        }));
        hideCookiesConsent();
        disableAnalytics();
        disableMarketing();
        showToast('You have declined non-essential cookies', 'info');
    }
    
    function showToast(message, type = 'info') {
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
    
    function enableAnalytics() {
        console.log('Analytics enabled');
    }
    
    function disableAnalytics() {
        console.log('Analytics disabled');
    }
    
    function enableMarketing() {
        console.log('Marketing cookies enabled');
    }
    
    function disableMarketing() {
        console.log('Marketing cookies disabled');
    }
    
    function loadSavedPreferences() {
        const preferences = localStorage.getItem('cookies_preferences');
        if (preferences) {
            try {
                const prefs = JSON.parse(preferences);
                const analyticsCheckbox = document.getElementById('analytics-cookies');
                const marketingCheckbox = document.getElementById('marketing-cookies');
                if (analyticsCheckbox) analyticsCheckbox.checked = prefs.analytics || false;
                if (marketingCheckbox) marketingCheckbox.checked = prefs.marketing || false;
            } catch (e) {
                console.error('Error loading preferences:', e);
            }
        }
    }
    
    // Initialize cookies consent
    document.addEventListener('DOMContentLoaded', function() {
        loadSavedPreferences();
        
        setTimeout(() => {
            if (!hasCookieConsent() && !hasDeclinedCookies() && !hasPreferencesSaved()) {
                showCookiesConsent();
            }
        }, 1000);
        
        const acceptBtn = document.getElementById('accept-cookies');
        const declineBtn = document.getElementById('decline-cookies');
        const savePrefsBtn = document.getElementById('save-preferences');
        const closeBtn = document.querySelector('#decline-cookies');
        const backdrop = document.getElementById('cookies-backdrop');
        
        if (acceptBtn) acceptBtn.addEventListener('click', acceptCookies);
        if (declineBtn) declineBtn.addEventListener('click', declineCookies);
        if (savePrefsBtn) savePrefsBtn.addEventListener('click', savePreferences);
        if (closeBtn) closeBtn.addEventListener('click', declineCookies);
        if (backdrop) backdrop.addEventListener('click', declineCookies);
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
    
    /* Smooth scale transition for modal */
    .scale-95 {
        transform: scale(0.95);
    }
    .scale-100 {
        transform: scale(1);
    }
</style>