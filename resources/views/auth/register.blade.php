<!DOCTYPE html>
<html lang="en" class="dark h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Create your PrimevestMarket trading account.">
    <title>Create Account · PrimevestMarket</title>

    <!-- Favicon -->
    <link href="{{ asset('primevestmarket/storage/app/public/photos/BdNLfPXnjtZpQd84tP1qPi7Doca8jaPb7f1J1uCG.png') }}" rel="icon" type="image/x-icon">

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'dark');
            document.documentElement.classList.add('dark');
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff', 100: '#e0e7ff', 200: '#c7d2fe', 300: '#a5b4fc',
                            400: '#818cf8', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca',
                            800: '#3730a3', 900: '#312e81',
                        },
                        'glass': 'rgba(255, 255, 255, 0.05)',
                    },
                    backdropBlur: { 'xs': '2px' },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.12/dist/cdn.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        body { overflow-x: hidden; }
        [x-cloak] { display: none !important; }
        .skiptranslate { display: none !important; }
        body { top: 0 !important; }
    </style>
</head>

<body class="h-full bg-gray-900 font-sans antialiased text-gray-900" x-data="{ darkMode: localStorage.theme === 'dark' || !localStorage.theme }" :class="{ 'dark': darkMode }" x-cloak>

    <!-- Theme Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode)"
            class="relative inline-flex items-center justify-center w-10 h-10 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors duration-150 backdrop-blur-sm" :aria-pressed="darkMode">
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 12.728l-.707-.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <div class="relative min-h-screen overflow-hidden">
        <div class="relative z-10">
            <div class="min-h-screen bg-gray-900 py-8">
                <div class="flex items-center justify-center px-4">
                    <div class="w-full max-w-md">
                        <div class="bg-gray-900 border border-gray-700 rounded-xl p-6 shadow-xl">

                            <!-- Header -->
                            <div class="text-center mb-6">
                                <img src="{{ asset('primevestmarket/storage/app/public/photos/rJULSCPNqsykfmmjM9l0J5OMEJUGKcuAUlhRX9WX.png') }}" class="h-12 w-auto mx-auto mb-4" alt="PrimevestMarket" />
                                <h1 class="text-2xl font-bold text-white mb-2">Join <span class="text-blue-400">PrimevestMarket</span></h1>
                                <p class="text-gray-400 text-sm">Create your trading account</p>
                            </div>

                            <!-- Alerts -->
                            @if ($errors->any())
                                <div class="mb-4 rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-300 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Registration Form -->
                            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="referral_code" value="{{ old('referral_code', $ref ?? '') }}">

                                <!-- Full Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-200 mb-1">Full Name <span class="text-red-400">*</span></label>
                                    <input type="text" name="name" id="name" required value="{{ old('name') }}" class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="Enter full name" autofocus autocomplete="name">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Email Address <span class="text-red-400">*</span></label>
                                    <input type="email" name="email" id="email" required value="{{ old('email') }}" class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="your.email@example.com" autocomplete="email">
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-200 mb-1">Phone Number <span class="text-red-400">*</span></label>
                                    <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}" class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="+1 (555) 123-4567" autocomplete="tel">
                                </div>

                                <!-- Country -->
                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-200 mb-1">Country <span class="text-red-400">*</span></label>
                                    <select name="country" id="country" required class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white focus:border-blue-400 focus:ring-1 focus:ring-blue-400">
                                        <option disabled {{ old('country') ? '' : 'selected' }}>Select your country</option>
                                        @php($countries = ['Afghanistan','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antigua & Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bonaire','Bosnia & Herzegovina','Botswana','Brazil','British Indian Ocean Ter','Brunei','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Canary Islands','Cape Verde','Cayman Islands','Central African Republic','Chad','Channel Islands','Chile','China','Christmas Island','Cocos Island','Colombia','Comoros','Congo','Cook Islands','Costa Rica','Cote D Ivoire','Croatia','Cuba','Curacao','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','East Timor','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands','Faroe Islands','Fiji','Finland','France','French Guiana','French Polynesia','French Southern Ter','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Great Britain','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guyana','Haiti','Hawaii','Honduras','Hong Kong','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Isle of Man','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Korea North','Korea South','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macau','Macedonia','Madagascar','Malaysia','Malawi','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Midway Islands','Moldova','Monaco','Mongolia','Montserrat','Morocco','Mozambique','Myanmar','Nambia','Nauru','Nepal','Netherland Antilles','Netherlands','Nevis','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Norway','Oman','Pakistan','Palau Island','Palestine','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn Island','Poland','Portugal','Puerto Rico','Qatar','Republic of Montenegro','Republic of Serbia','Reunion','Romania','Russia','Rwanda','St Barthelemy','St Eustatius','St Helena','St Kitts-Nevis','St Lucia','St Maarten','St Pierre & Miquelon','St Vincent & Grenadines','Saipan','Samoa','Samoa American','San Marino','Sao Tome & Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syria','Tahiti','Taiwan','Tajikistan','Tanzania','Thailand','Togo','Tokelau','Tonga','Trinidad & Tobago','Tunisia','Turkey','Turkmenistan','Turks & Caicos Is','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States of America','Uruguay','Uzbekistan','Vanuatu','Vatican City State','Venezuela','Vietnam','Virgin Islands (Brit)','Virgin Islands (USA)','Wake Island','Wallis & Futana Is','Yemen','Zaire','Zambia','Zimbabwe'])
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}" {{ old('country') === $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Password <span class="text-red-400">*</span></label>
                                    <input type="password" name="password" id="password" required class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="Create strong password" autocomplete="new-password">
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-200 mb-1">Confirm Password <span class="text-red-400">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-1 focus:ring-blue-400" placeholder="Re-enter your password" autocomplete="new-password">
                                </div>

                                <!-- Terms Agreement -->
                                <div class="flex items-start gap-3">
                                    <input type="checkbox" name="agree" id="agree" required class="mt-1 h-4 w-4 rounded border-gray-600 bg-gray-800 text-blue-500">
                                    <label for="agree" class="text-sm text-gray-200">
                                        I agree to PrimevestMarket's
                                        <a href="{{ route('terms') }}" target="_blank" class="text-blue-400 hover:text-blue-300 underline">Terms and Conditions</a>
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" name="btn-reg" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">Create Account</button>
                            </form>

                            <!-- Footer -->
                            <div class="mt-6 text-center">
                                <p class="text-gray-400 text-sm">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 underline">Sign in here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language Selector -->
    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {
            default_language: "en",
            alt_flags: { "en": "usa" },
            wrapper_selector: ".gtranslate_wrapper",
            flag_style: "3d",
        };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
        document.addEventListener('alpine:updated', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
    </script>
</body>
</html>
