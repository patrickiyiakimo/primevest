@extends('layouts.dashboard')

@section('page-title', 'Profile Settings')
@section('breadcrumb', 'Manage your account settings')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="border-l-4 border-green-600 shadow-md p-6 bg-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Profile Settings</h1>
                <p class="text-gray-500 mt-1">Manage your account information and preferences</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-50 border border-green-200 px-4 py-2">
                    <span class="text-green-600 text-sm font-semibold">Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                </div>
                <div class="w-14 h-14 bg-green-600 flex items-center justify-center shadow-sm">
                    <span class="text-white font-bold text-xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Profile Form -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Account Profile Section -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Account Profile</h2>
                    </div>
                </div>
                <div class="p-6">
                    <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Full Name -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="name" 
                                           value="{{ old('name', $user->name) }}" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="Enter your full name">
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Email Address -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" 
                                           name="email" 
                                           value="{{ old('email', $user->email) }}" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Phone Number -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input type="tel" 
                                           name="phone" 
                                           value="{{ old('phone', $user->phone) }}" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="+234XXXXXXXXXX">
                                </div>
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                           <!-- Country -->
<div class="md:col-span-2">
    <label class="block text-sm font-semibold text-gray-700 mb-2">Country *</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <select name="country" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300 appearance-none bg-white">
            <option value="">Select Country</option>
            <option value="Afghanistan" {{ old('country', $user->country) == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
            <option value="Albania" {{ old('country', $user->country) == 'Albania' ? 'selected' : '' }}>Albania</option>
            <option value="Algeria" {{ old('country', $user->country) == 'Algeria' ? 'selected' : '' }}>Algeria</option>
            <option value="Andorra" {{ old('country', $user->country) == 'Andorra' ? 'selected' : '' }}>Andorra</option>
            <option value="Angola" {{ old('country', $user->country) == 'Angola' ? 'selected' : '' }}>Angola</option>
            <option value="Antigua and Barbuda" {{ old('country', $user->country) == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
            <option value="Argentina" {{ old('country', $user->country) == 'Argentina' ? 'selected' : '' }}>Argentina</option>
            <option value="Armenia" {{ old('country', $user->country) == 'Armenia' ? 'selected' : '' }}>Armenia</option>
            <option value="Australia" {{ old('country', $user->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
            <option value="Austria" {{ old('country', $user->country) == 'Austria' ? 'selected' : '' }}>Austria</option>
            <option value="Azerbaijan" {{ old('country', $user->country) == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
            <option value="Bahamas" {{ old('country', $user->country) == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
            <option value="Bahrain" {{ old('country', $user->country) == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
            <option value="Bangladesh" {{ old('country', $user->country) == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
            <option value="Barbados" {{ old('country', $user->country) == 'Barbados' ? 'selected' : '' }}>Barbados</option>
            <option value="Belarus" {{ old('country', $user->country) == 'Belarus' ? 'selected' : '' }}>Belarus</option>
            <option value="Belgium" {{ old('country', $user->country) == 'Belgium' ? 'selected' : '' }}>Belgium</option>
            <option value="Belize" {{ old('country', $user->country) == 'Belize' ? 'selected' : '' }}>Belize</option>
            <option value="Benin" {{ old('country', $user->country) == 'Benin' ? 'selected' : '' }}>Benin</option>
            <option value="Bhutan" {{ old('country', $user->country) == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
            <option value="Bolivia" {{ old('country', $user->country) == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
            <option value="Bosnia and Herzegovina" {{ old('country', $user->country) == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
            <option value="Botswana" {{ old('country', $user->country) == 'Botswana' ? 'selected' : '' }}>Botswana</option>
            <option value="Brazil" {{ old('country', $user->country) == 'Brazil' ? 'selected' : '' }}>Brazil</option>
            <option value="Brunei" {{ old('country', $user->country) == 'Brunei' ? 'selected' : '' }}>Brunei</option>
            <option value="Bulgaria" {{ old('country', $user->country) == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
            <option value="Burkina Faso" {{ old('country', $user->country) == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
            <option value="Burundi" {{ old('country', $user->country) == 'Burundi' ? 'selected' : '' }}>Burundi</option>
            <option value="Cambodia" {{ old('country', $user->country) == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
            <option value="Cameroon" {{ old('country', $user->country) == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
            <option value="Canada" {{ old('country', $user->country) == 'Canada' ? 'selected' : '' }}>Canada</option>
            <option value="Cape Verde" {{ old('country', $user->country) == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
            <option value="Central African Republic" {{ old('country', $user->country) == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
            <option value="Chad" {{ old('country', $user->country) == 'Chad' ? 'selected' : '' }}>Chad</option>
            <option value="Chile" {{ old('country', $user->country) == 'Chile' ? 'selected' : '' }}>Chile</option>
            <option value="China" {{ old('country', $user->country) == 'China' ? 'selected' : '' }}>China</option>
            <option value="Colombia" {{ old('country', $user->country) == 'Colombia' ? 'selected' : '' }}>Colombia</option>
            <option value="Comoros" {{ old('country', $user->country) == 'Comoros' ? 'selected' : '' }}>Comoros</option>
            <option value="Congo" {{ old('country', $user->country) == 'Congo' ? 'selected' : '' }}>Congo</option>
            <option value="Costa Rica" {{ old('country', $user->country) == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
            <option value="Croatia" {{ old('country', $user->country) == 'Croatia' ? 'selected' : '' }}>Croatia</option>
            <option value="Cuba" {{ old('country', $user->country) == 'Cuba' ? 'selected' : '' }}>Cuba</option>
            <option value="Cyprus" {{ old('country', $user->country) == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
            <option value="Czech Republic" {{ old('country', $user->country) == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
            <option value="Denmark" {{ old('country', $user->country) == 'Denmark' ? 'selected' : '' }}>Denmark</option>
            <option value="Djibouti" {{ old('country', $user->country) == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
            <option value="Dominica" {{ old('country', $user->country) == 'Dominica' ? 'selected' : '' }}>Dominica</option>
            <option value="Dominican Republic" {{ old('country', $user->country) == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
            <option value="Ecuador" {{ old('country', $user->country) == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
            <option value="Egypt" {{ old('country', $user->country) == 'Egypt' ? 'selected' : '' }}>Egypt</option>
            <option value="El Salvador" {{ old('country', $user->country) == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
            <option value="Equatorial Guinea" {{ old('country', $user->country) == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
            <option value="Eritrea" {{ old('country', $user->country) == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
            <option value="Estonia" {{ old('country', $user->country) == 'Estonia' ? 'selected' : '' }}>Estonia</option>
            <option value="Eswatini" {{ old('country', $user->country) == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
            <option value="Ethiopia" {{ old('country', $user->country) == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
            <option value="Fiji" {{ old('country', $user->country) == 'Fiji' ? 'selected' : '' }}>Fiji</option>
            <option value="Finland" {{ old('country', $user->country) == 'Finland' ? 'selected' : '' }}>Finland</option>
            <option value="France" {{ old('country', $user->country) == 'France' ? 'selected' : '' }}>France</option>
            <option value="Gabon" {{ old('country', $user->country) == 'Gabon' ? 'selected' : '' }}>Gabon</option>
            <option value="Gambia" {{ old('country', $user->country) == 'Gambia' ? 'selected' : '' }}>Gambia</option>
            <option value="Georgia" {{ old('country', $user->country) == 'Georgia' ? 'selected' : '' }}>Georgia</option>
            <option value="Germany" {{ old('country', $user->country) == 'Germany' ? 'selected' : '' }}>Germany</option>
            <option value="Ghana" {{ old('country', $user->country) == 'Ghana' ? 'selected' : '' }}>Ghana</option>
            <option value="Greece" {{ old('country', $user->country) == 'Greece' ? 'selected' : '' }}>Greece</option>
            <option value="Grenada" {{ old('country', $user->country) == 'Grenada' ? 'selected' : '' }}>Grenada</option>
            <option value="Guatemala" {{ old('country', $user->country) == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
            <option value="Guinea" {{ old('country', $user->country) == 'Guinea' ? 'selected' : '' }}>Guinea</option>
            <option value="Guinea-Bissau" {{ old('country', $user->country) == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
            <option value="Guyana" {{ old('country', $user->country) == 'Guyana' ? 'selected' : '' }}>Guyana</option>
            <option value="Haiti" {{ old('country', $user->country) == 'Haiti' ? 'selected' : '' }}>Haiti</option>
            <option value="Honduras" {{ old('country', $user->country) == 'Honduras' ? 'selected' : '' }}>Honduras</option>
            <option value="Hungary" {{ old('country', $user->country) == 'Hungary' ? 'selected' : '' }}>Hungary</option>
            <option value="Iceland" {{ old('country', $user->country) == 'Iceland' ? 'selected' : '' }}>Iceland</option>
            <option value="India" {{ old('country', $user->country) == 'India' ? 'selected' : '' }}>India</option>
            <option value="Indonesia" {{ old('country', $user->country) == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
            <option value="Iran" {{ old('country', $user->country) == 'Iran' ? 'selected' : '' }}>Iran</option>
            <option value="Iraq" {{ old('country', $user->country) == 'Iraq' ? 'selected' : '' }}>Iraq</option>
            <option value="Ireland" {{ old('country', $user->country) == 'Ireland' ? 'selected' : '' }}>Ireland</option>
            <option value="Israel" {{ old('country', $user->country) == 'Israel' ? 'selected' : '' }}>Israel</option>
            <option value="Italy" {{ old('country', $user->country) == 'Italy' ? 'selected' : '' }}>Italy</option>
            <option value="Jamaica" {{ old('country', $user->country) == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
            <option value="Japan" {{ old('country', $user->country) == 'Japan' ? 'selected' : '' }}>Japan</option>
            <option value="Jordan" {{ old('country', $user->country) == 'Jordan' ? 'selected' : '' }}>Jordan</option>
            <option value="Kazakhstan" {{ old('country', $user->country) == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
            <option value="Kenya" {{ old('country', $user->country) == 'Kenya' ? 'selected' : '' }}>Kenya</option>
            <option value="Kiribati" {{ old('country', $user->country) == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
            <option value="Korea, North" {{ old('country', $user->country) == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
            <option value="Korea, South" {{ old('country', $user->country) == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
            <option value="Kosovo" {{ old('country', $user->country) == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
            <option value="Kuwait" {{ old('country', $user->country) == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
            <option value="Kyrgyzstan" {{ old('country', $user->country) == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
            <option value="Laos" {{ old('country', $user->country) == 'Laos' ? 'selected' : '' }}>Laos</option>
            <option value="Latvia" {{ old('country', $user->country) == 'Latvia' ? 'selected' : '' }}>Latvia</option>
            <option value="Lebanon" {{ old('country', $user->country) == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
            <option value="Lesotho" {{ old('country', $user->country) == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
            <option value="Liberia" {{ old('country', $user->country) == 'Liberia' ? 'selected' : '' }}>Liberia</option>
            <option value="Libya" {{ old('country', $user->country) == 'Libya' ? 'selected' : '' }}>Libya</option>
            <option value="Liechtenstein" {{ old('country', $user->country) == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
            <option value="Lithuania" {{ old('country', $user->country) == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
            <option value="Luxembourg" {{ old('country', $user->country) == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
            <option value="Madagascar" {{ old('country', $user->country) == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
            <option value="Malawi" {{ old('country', $user->country) == 'Malawi' ? 'selected' : '' }}>Malawi</option>
            <option value="Malaysia" {{ old('country', $user->country) == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
            <option value="Maldives" {{ old('country', $user->country) == 'Maldives' ? 'selected' : '' }}>Maldives</option>
            <option value="Mali" {{ old('country', $user->country) == 'Mali' ? 'selected' : '' }}>Mali</option>
            <option value="Malta" {{ old('country', $user->country) == 'Malta' ? 'selected' : '' }}>Malta</option>
            <option value="Marshall Islands" {{ old('country', $user->country) == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
            <option value="Mauritania" {{ old('country', $user->country) == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
            <option value="Mauritius" {{ old('country', $user->country) == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
            <option value="Mexico" {{ old('country', $user->country) == 'Mexico' ? 'selected' : '' }}>Mexico</option>
            <option value="Micronesia" {{ old('country', $user->country) == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
            <option value="Moldova" {{ old('country', $user->country) == 'Moldova' ? 'selected' : '' }}>Moldova</option>
            <option value="Monaco" {{ old('country', $user->country) == 'Monaco' ? 'selected' : '' }}>Monaco</option>
            <option value="Mongolia" {{ old('country', $user->country) == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
            <option value="Montenegro" {{ old('country', $user->country) == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
            <option value="Morocco" {{ old('country', $user->country) == 'Morocco' ? 'selected' : '' }}>Morocco</option>
            <option value="Mozambique" {{ old('country', $user->country) == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
            <option value="Myanmar" {{ old('country', $user->country) == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
            <option value="Namibia" {{ old('country', $user->country) == 'Namibia' ? 'selected' : '' }}>Namibia</option>
            <option value="Nauru" {{ old('country', $user->country) == 'Nauru' ? 'selected' : '' }}>Nauru</option>
            <option value="Nepal" {{ old('country', $user->country) == 'Nepal' ? 'selected' : '' }}>Nepal</option>
            <option value="Netherlands" {{ old('country', $user->country) == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
            <option value="New Zealand" {{ old('country', $user->country) == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
            <option value="Nicaragua" {{ old('country', $user->country) == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
            <option value="Niger" {{ old('country', $user->country) == 'Niger' ? 'selected' : '' }}>Niger</option>
            <option value="Nigeria" {{ old('country', $user->country) == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
            <option value="North Macedonia" {{ old('country', $user->country) == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
            <option value="Norway" {{ old('country', $user->country) == 'Norway' ? 'selected' : '' }}>Norway</option>
            <option value="Oman" {{ old('country', $user->country) == 'Oman' ? 'selected' : '' }}>Oman</option>
            <option value="Pakistan" {{ old('country', $user->country) == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
            <option value="Palau" {{ old('country', $user->country) == 'Palau' ? 'selected' : '' }}>Palau</option>
            <option value="Palestine" {{ old('country', $user->country) == 'Palestine' ? 'selected' : '' }}>Palestine</option>
            <option value="Panama" {{ old('country', $user->country) == 'Panama' ? 'selected' : '' }}>Panama</option>
            <option value="Papua New Guinea" {{ old('country', $user->country) == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
            <option value="Paraguay" {{ old('country', $user->country) == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
            <option value="Peru" {{ old('country', $user->country) == 'Peru' ? 'selected' : '' }}>Peru</option>
            <option value="Philippines" {{ old('country', $user->country) == 'Philippines' ? 'selected' : '' }}>Philippines</option>
            <option value="Poland" {{ old('country', $user->country) == 'Poland' ? 'selected' : '' }}>Poland</option>
            <option value="Portugal" {{ old('country', $user->country) == 'Portugal' ? 'selected' : '' }}>Portugal</option>
            <option value="Qatar" {{ old('country', $user->country) == 'Qatar' ? 'selected' : '' }}>Qatar</option>
            <option value="Romania" {{ old('country', $user->country) == 'Romania' ? 'selected' : '' }}>Romania</option>
            <option value="Russia" {{ old('country', $user->country) == 'Russia' ? 'selected' : '' }}>Russia</option>
            <option value="Rwanda" {{ old('country', $user->country) == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
            <option value="Saint Kitts and Nevis" {{ old('country', $user->country) == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
            <option value="Saint Lucia" {{ old('country', $user->country) == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
            <option value="Saint Vincent and the Grenadines" {{ old('country', $user->country) == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
            <option value="Samoa" {{ old('country', $user->country) == 'Samoa' ? 'selected' : '' }}>Samoa</option>
            <option value="San Marino" {{ old('country', $user->country) == 'San Marino' ? 'selected' : '' }}>San Marino</option>
            <option value="Sao Tome and Principe" {{ old('country', $user->country) == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
            <option value="Saudi Arabia" {{ old('country', $user->country) == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
            <option value="Senegal" {{ old('country', $user->country) == 'Senegal' ? 'selected' : '' }}>Senegal</option>
            <option value="Serbia" {{ old('country', $user->country) == 'Serbia' ? 'selected' : '' }}>Serbia</option>
            <option value="Seychelles" {{ old('country', $user->country) == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
            <option value="Sierra Leone" {{ old('country', $user->country) == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
            <option value="Singapore" {{ old('country', $user->country) == 'Singapore' ? 'selected' : '' }}>Singapore</option>
            <option value="Slovakia" {{ old('country', $user->country) == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
            <option value="Slovenia" {{ old('country', $user->country) == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
            <option value="Solomon Islands" {{ old('country', $user->country) == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
            <option value="Somalia" {{ old('country', $user->country) == 'Somalia' ? 'selected' : '' }}>Somalia</option>
            <option value="South Africa" {{ old('country', $user->country) == 'South Africa' ? 'selected' : '' }}>South Africa</option>
            <option value="South Sudan" {{ old('country', $user->country) == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
            <option value="Spain" {{ old('country', $user->country) == 'Spain' ? 'selected' : '' }}>Spain</option>
            <option value="Sri Lanka" {{ old('country', $user->country) == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
            <option value="Sudan" {{ old('country', $user->country) == 'Sudan' ? 'selected' : '' }}>Sudan</option>
            <option value="Suriname" {{ old('country', $user->country) == 'Suriname' ? 'selected' : '' }}>Suriname</option>
            <option value="Sweden" {{ old('country', $user->country) == 'Sweden' ? 'selected' : '' }}>Sweden</option>
            <option value="Switzerland" {{ old('country', $user->country) == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
            <option value="Syria" {{ old('country', $user->country) == 'Syria' ? 'selected' : '' }}>Syria</option>
            <option value="Taiwan" {{ old('country', $user->country) == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
            <option value="Tajikistan" {{ old('country', $user->country) == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
            <option value="Tanzania" {{ old('country', $user->country) == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
            <option value="Thailand" {{ old('country', $user->country) == 'Thailand' ? 'selected' : '' }}>Thailand</option>
            <option value="Timor-Leste" {{ old('country', $user->country) == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
            <option value="Togo" {{ old('country', $user->country) == 'Togo' ? 'selected' : '' }}>Togo</option>
            <option value="Tonga" {{ old('country', $user->country) == 'Tonga' ? 'selected' : '' }}>Tonga</option>
            <option value="Trinidad and Tobago" {{ old('country', $user->country) == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
            <option value="Tunisia" {{ old('country', $user->country) == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
            <option value="Turkey" {{ old('country', $user->country) == 'Turkey' ? 'selected' : '' }}>Turkey</option>
            <option value="Turkmenistan" {{ old('country', $user->country) == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
            <option value="Tuvalu" {{ old('country', $user->country) == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
            <option value="Uganda" {{ old('country', $user->country) == 'Uganda' ? 'selected' : '' }}>Uganda</option>
            <option value="Ukraine" {{ old('country', $user->country) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
            <option value="United Arab Emirates" {{ old('country', $user->country) == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
            <option value="United Kingdom" {{ old('country', $user->country) == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
            <option value="United States" {{ old('country', $user->country) == 'United States' ? 'selected' : '' }}>United States</option>
            <option value="Uruguay" {{ old('country', $user->country) == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
            <option value="Uzbekistan" {{ old('country', $user->country) == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
            <option value="Vanuatu" {{ old('country', $user->country) == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
            <option value="Vatican City" {{ old('country', $user->country) == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
            <option value="Venezuela" {{ old('country', $user->country) == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
            <option value="Vietnam" {{ old('country', $user->country) == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
            <option value="Yemen" {{ old('country', $user->country) == 'Yemen' ? 'selected' : '' }}>Yemen</option>
            <option value="Zambia" {{ old('country', $user->country) == 'Zambia' ? 'selected' : '' }}>Zambia</option>
            <option value="Zimbabwe" {{ old('country', $user->country) == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </div>
    @error('country')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold transition-all duration-300 shadow-lg flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Security Settings</h2>
                    </div>
                </div>
                <div class="p-6">
                    <form id="passwordForm" action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-5">
                            <!-- Old Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Current Password *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           name="current_password" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="Enter your current password">
                                </div>
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- New Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">New Password *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           name="password" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="Enter your new password">
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Confirm New Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm New Password *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                           placeholder="Confirm your new password">
                                </div>
                            </div>
                            
                            <div class="bg-blue-50 p-3 border border-blue-200">
                                <div class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-xs text-blue-700">Password must be at least 8 characters long</p>
                                </div>
                            </div>
                            
                            <button type="submit" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold transition-all duration-300 shadow-lg flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="space-y-6">
            <!-- Account Status Card -->
            <div class="bg-green-50 p-6 border border-green-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-green-600 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-green-800">Account Status</p>
                            <p class="text-xs text-green-600">Verified Account</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-green-600 text-white text-xs font-semibold">Active</span>
                </div>
                <div class="border-t border-green-200 pt-4 mt-2">
                    <div class="flex justify-between text-sm mt-2">
                        <span class="text-green-700">Member Since:</span>
                        <span class="text-green-900 font-semibold">{{ Auth::user()->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Referral Link Section -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Referral Program</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-3 border border-gray-200">
                            <p class="text-xs text-gray-500 mb-1">Your Referral Link</p>
                            <div class="flex items-center gap-2">
                                <input type="text" 
                                       id="referralLink" 
                                       value="{{ url('/register?ref=' . Auth::user()->referral_code) }}" 
                                       class="flex-1 px-3 py-2 border border-gray-200 bg-white text-gray-600 text-xs font-mono"
                                       readonly>
                                <button onclick="copyReferralLink()" class="px-3 py-2 bg-green-600 hover:bg-green-700 text-white transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="bg-yellow-50 p-4 border border-yellow-200">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-yellow-600 flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">5%</span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-yellow-800">Earn 5% Commission</p>
                                    <p class="text-xs text-yellow-700 mt-1">When your referred friends sign up and deposit, you earn 5% of their deposit amount!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Affiliates Table -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-900">Your Referrals</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-gray-500">{{ $affiliates->count() }} Total</span>
                            @php
                                $earnedBonus = $affiliates->sum(function($affiliate) {
                                    return $affiliate->balance * 0.05;
                                });
                            @endphp
                            <span class="text-xs text-green-600 font-semibold">Earned: ${{ number_format($earnedBonus, 2) }}</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Joined Date</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contribution</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($affiliates ?? [] as $index => $affiliate)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-800">{{ $affiliate->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $affiliate->email }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if($affiliate->balance > 0)
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 bg-green-600 mr-1"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700">
                                            <span class="w-1.5 h-1.5 bg-yellow-600 mr-1"></span>
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $affiliate->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-3 text-sm font-semibold text-green-600">
                                    ${{ number_format($affiliate->balance * 0.05, 2) }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <p class="text-sm font-medium">No referrals yet</p>
                                    <p class="text-xs mt-1">Share your referral link to start earning 5% commission</p>
                                    <div class="mt-4">
                                        <button onclick="copyReferralLink()" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition-all duration-300">
                                            Copy Referral Link
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<script>
    // Toast Notification System
    class Toast {
        constructor() {
            this.container = document.getElementById('toastContainer');
            if (!this.container) {
                this.container = document.createElement('div');
                this.container.id = 'toastContainer';
                this.container.className = 'toast-container';
                document.body.appendChild(this.container);
            }
        }
        
        show(message, type = 'success', duration = 3000) {
            const toast = document.createElement('div');
            const colors = {
                success: 'bg-green-600',
                error: 'bg-red-600',
                warning: 'bg-yellow-600',
                info: 'bg-blue-600'
            };
            const icons = {
                success: '✓',
                error: '✗',
                warning: '⚠',
                info: 'ℹ'
            };
            
            toast.className = `${colors[type]} text-white px-6 py-3 shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-transform duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 3000) { this.show(message, 'success', duration); }
        error(message, duration = 3000) { this.show(message, 'error', duration); }
        warning(message, duration = 3000) { this.show(message, 'warning', duration); }
        info(message, duration = 3000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    
    function copyReferralLink() {
        const linkInput = document.getElementById('referralLink');
        linkInput.select();
        linkInput.setSelectionRange(0, 99999);
        document.execCommand('copy');
        toast.success('Referral link copied to clipboard!');
    }
    
    // Show success message from session
    @if(session('success'))
        toast.success('{{ session('success') }}');
    @endif
    
    @if(session('error'))
        toast.error('{{ session('error') }}');
    @endif
</script>

<style>
    /* No rounded corners */
    .bg-white, .border, button, a, .toast, .bg-green-50, .bg-gray-50, .bg-yellow-50, .bg-blue-50 {
        border-radius: 0 !important;
    }
    
    /* Remove all border-radius */
    * {
        border-radius: 0 !important;
    }
    
    .rounded-full {
        border-radius: 0 !important;
    }
    
    /* Remove hover scaling */
    .hover\:scale-105:hover {
        transform: none !important;
    }
</style>
@endsection