<!-- AI Support Chat Button -->
<button id="aiChatButton" class="fixed bottom-6 right-6 z-50 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-full p-4 shadow-2xl transition-all duration-300 transform hover:scale-110 group">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
    </svg>
    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-400 rounded-full animate-pulse"></span>
</button>

<!-- AI Support Chat Modal -->
<div id="aiChatModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden animate-slideUp">
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-semibold">PrimeVest AI Assistant</h3>
                    <p class="text-xs text-gray-400"><span class=" text-green-500 text-xs"> Online </span> Always here to help!</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button id="clearHistoryBtn" class="text-gray-400 hover:text-red-400 transition-colors" title="Clear history">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
                <button id="closeChatBtn" class="text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Chat Messages -->
        <div id="chatMessages" class="h-96 overflow-y-auto p-4 space-y-3 bg-gray-50">
            <!-- Messages will load here -->
        </div>
        
        <!-- Quick Questions -->
        <div class="px-4 py-2 border-t border-gray-100 bg-gray-50">
            <div class="flex flex-wrap gap-2">
                <button onclick="askQuestion('What is PrimeVest?')" class="text-xs bg-white hover:bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full border border-gray-200 transition-all">What is PrimeVest?</button>
                <button onclick="askQuestion('How to deposit?')" class="text-xs bg-white hover:bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full border border-gray-200 transition-all">How to deposit?</button>
                <button onclick="askQuestion('Investment plans')" class="text-xs bg-white hover:bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full border border-gray-200 transition-all">Investment plans</button>
                <button onclick="askQuestion('Monthly profit report')" class="text-xs bg-white hover:bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full border border-gray-200 transition-all">Monthly report</button>
                <button onclick="askQuestion('Current balance')" class="text-xs bg-white hover:bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full border border-gray-200 transition-all">My balance</button>
            </div>
        </div>
        
        <!-- Chat Input -->
        <div class="p-4 border-t border-gray-200 bg-white">
            <div class="flex gap-2">
                <input type="text" id="chatInput" placeholder="Type your question..." class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-sm">
                <button id="sendMessageBtn" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Send
                </button>
            </div>
            <p class="text-xs text-gray-400 mt-2 text-center">Powered by DeepSeek AI • Responses saved to your history</p>
        </div>
    </div>
</div>

<script>
    let currentUserId = {{ Auth::id() }};
    
    // Load chat history on open
    async function loadChatHistory() {
        try {
            const response = await fetch('/ai/history');
            const data = await response.json();
            
            if (data.success && data.history.length > 0) {
                // Clear existing messages except the first welcome
                const chatMessages = document.getElementById('chatMessages');
                chatMessages.innerHTML = '';
                
                // Display each historical message
                data.history.forEach(msg => {
                    addMessageToChat(msg.question, true);
                    addMessageToChat(msg.answer, false);
                });
            } else {
                // Show welcome message if no history
                const chatMessages = document.getElementById('chatMessages');
                if (chatMessages.children.length === 0) {
                    addMessageToChat("👋 Hi! I'm your PrimeVest AI Assistant. I can help you with investment plans, deposits, withdrawals, and provide monthly profit reports. What would you like to know?", false);
                }
            }
        } catch (error) {
            console.error('Error loading history:', error);
        }
    }
    
    function addMessageToChat(text, isUser = false) {
        const chatMessages = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex items-start gap-2 ${isUser ? 'flex-row-reverse' : ''}`;
        
        if (isUser) {
            messageDiv.innerHTML = `
                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-gray-600 text-xs font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="flex-1 bg-red-500 text-white rounded-2xl rounded-tr-none px-4 py-2">
                    <p class="text-sm">${escapeHtml(text)}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div class="flex-1 bg-white rounded-2xl rounded-tl-none px-4 py-2 shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-800 whitespace-pre-line">${escapeHtml(text)}</p>
                </div>
            `;
        }
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    async function askQuestion(question) {
        if (!question.trim()) return;
        
        // Add user message
        addMessageToChat(question, true);
        document.getElementById('chatInput').value = '';
        
        // Show typing indicator
        showTypingIndicator();
        
        try {
            const response = await fetch('/ai/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ question: question })
            });
            
            const data = await response.json();
            removeTypingIndicator();
            
            if (data.success) {
                addMessageToChat(data.response);
            } else {
                addMessageToChat("I'm having trouble connecting. Please try again in a moment.");
            }
        } catch (error) {
            removeTypingIndicator();
            addMessageToChat("Sorry, I encountered an error. Please refresh the page and try again.");
        }
    }
    
    async function clearHistory() {
        if (confirm('Are you sure you want to clear your chat history?')) {
            try {
                const response = await fetch('/ai/clear-history', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                if (data.success) {
                    // Clear chat messages
                    const chatMessages = document.getElementById('chatMessages');
                    chatMessages.innerHTML = '';
                    addMessageToChat("Chat history cleared! 👋 I'm here to help with any questions you have.", false);
                }
            } catch (error) {
                console.error('Error clearing history:', error);
            }
        }
    }
    
    // Chat UI functions
    function showTypingIndicator() {
        const chatMessages = document.getElementById('chatMessages');
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typingIndicator';
        typingDiv.className = 'flex items-start gap-2';
        typingDiv.innerHTML = `
            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <div class="flex-1 bg-white rounded-2xl rounded-tl-none px-4 py-3 shadow-sm border border-gray-100">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    function removeTypingIndicator() {
        const indicator = document.getElementById('typingIndicator');
        if (indicator) indicator.remove();
    }
    
    // Event Listeners
    const chatButton = document.getElementById('aiChatButton');
    const chatModal = document.getElementById('aiChatModal');
    const closeChatBtn = document.getElementById('closeChatBtn');
    const sendMessageBtn = document.getElementById('sendMessageBtn');
    const chatInput = document.getElementById('chatInput');
    const clearHistoryBtn = document.getElementById('clearHistoryBtn');
    
    chatButton.addEventListener('click', () => {
        chatModal.classList.remove('hidden');
        chatModal.classList.add('flex');
        loadChatHistory();
    });
    
    function closeChat() {
        chatModal.classList.remove('flex');
        chatModal.classList.add('hidden');
    }
    
    closeChatBtn.addEventListener('click', closeChat);
    chatModal.addEventListener('click', (e) => {
        if (e.target === chatModal) closeChat();
    });
    
    sendMessageBtn.addEventListener('click', () => {
        askQuestion(chatInput.value);
    });
    
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            askQuestion(chatInput.value);
        }
    });
    
    if (clearHistoryBtn) {
        clearHistoryBtn.addEventListener('click', clearHistory);
    }
</script>

<style>
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-slideUp {
        animation: slideUp 0.3s ease-out;
    }
    
    @keyframes bounce {
        0%, 60%, 100% {
            transform: translateY(0);
        }
        30% {
            transform: translateY(-5px);
        }
    }
    
    .animate-bounce {
        animation: bounce 1.4s ease-in-out infinite;
    }
</style>