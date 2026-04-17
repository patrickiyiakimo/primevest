@extends('layouts.dashboard')

@section('dashboard-content')
<div class="bg-white rounded-2xl shadow-xl p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Stock Trading</h1>
    @if(request()->get('symbol'))
        <p class="text-gray-600">Viewing stock: {{ request()->get('symbol') }}</p>
    @else
        <p class="text-gray-600">Stock trading page coming soon...</p>
    @endif
</div>
@endsection