@php
    // Load notifications from database folder
    $notificationsPath = database_path('notifications.php');
    $notifications = file_exists($notificationsPath) ? include($notificationsPath) : ['notifications' => []];
    $notifications = $notifications['notifications'] ?? [];
@endphp

<div class="live-notifications" x-data="{ 
    notifications: {{ json_encode($notifications) }},
    visible: true,
    currentIndex: 0,
    init() {
        if (this.notifications.length > 0) {
            this.showNextNotification();
            setInterval(() => {
                this.showNextNotification();
            }, 8000);
        }
    },
    showNextNotification() {
        if (this.notifications.length === 0) return;
        this.currentIndex = Math.floor(Math.random() * this.notifications.length);
        const element = document.getElementById('notification-toast');
        if (element) {
            element.classList.remove('translate-x-full');
            element.classList.add('translate-x-0');
            setTimeout(() => {
                element.classList.remove('translate-x-0');
                element.classList.add('translate-x-full');
            }, 5000);
        }
    }
}">
    <!-- Fixed Position Notification Toast -->
    <div id="notification-toast" 
         class="fixed bottom-6 right-6 z-50 transform translate-x-full transition-transform duration-500 ease-in-out"
         style="display: none;"
         x-show="visible && notifications.length > 0">
        <template x-for="(notification, idx) in notifications" :key="notification.id">
            <div x-show="idx === currentIndex" 
                 class="bg-white  border-l-4 overflow-hidden max-w-sm w-full"
                 :class="notification.type === 'profit' ? 'border-l-green-500' : 'border-l-blue-500'">
                
                <div class="p-4">
                    <div class="flex items-start gap-3">
                        <!-- Avatar -->
                        <!-- <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                             :class="notification.type === 'profit' ? 'bg-green-100' : 'bg-blue-100'">
                            <span class="font-bold text-sm" 
                                  :class="notification.type === 'profit' ? 'text-green-700' : 'text-blue-700'"
                                  x-text="notification.avatar"></span>
                        </div>
                         -->
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800" x-text="notification.user"></p>
                            
                            <!-- Profit Notification -->
                            <template x-if="notification.type === 'profit'">
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Made <span class="font-bold text-green-600">+$<span x-text="notification.amount.toLocaleString()"></span></span> 
                                    on <span class="font-medium" x-text="notification.instrument"></span>
                                </p>
                            </template>
                            
                            <!-- Real Estate Notification -->
                            <template x-if="notification.type === 'real_estate'">
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Invested <span class="font-bold text-blue-600">$<span x-text="notification.amount.toLocaleString()"></span></span> 
                                    in <span class="font-medium" x-text="notification.property"></span>
                                </p>
                            </template>
                            
                            <p class="text-xs text-gray-400 mt-1" x-text="notification.time"></p>
                        </div>
                        
                        <!-- Close Button -->
                        <button @click="visible = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>