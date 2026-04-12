@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">Welcome back, {{ $user->name }}!</h1>
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-4">
                    <p class="text-blue-700">Your current balance: <strong>${{ number_format($user->balance, 2) }}</strong></p>
                </div>
                <p>This is your investment dashboard.</p>
            </div>
        </div>
    </div>
</div>
@endsection