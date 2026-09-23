@extends('layouts.app')

@section('title', 'Crypto Education · PrimeVest Academy')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:1020px;text-align:center">
        <p class="pv-tag" style="text-align:center">PrimeVest Academy</p>
        <h1 class="pv-h1">Learn crypto the smart way</h1>
        <p class="pv-lead" style="margin:16px auto 0">Free, practical guides that take you from absolute beginner to confident investor. No jargon, no fluff.</p>
        <div style="display:flex;gap:12px;justify-content:center;margin-top:28px">
            <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Start Learning Free</a>
        </div>
    </div>
</section>

@php
    $courses = [
        ['beginner','Getting Started','Understand blockchain, wallets and how to buy your first crypto safely.', '12 lessons', 'Free'],
        ['beginner','Wallets & Security','Hot vs cold wallets, seed phrases and 10 habits of secure investors.', '8 lessons', 'Free'],
        ['intermediate','Staking & Yields','How staking works, APY vs APR and how to pick a trustworthy plan.', '9 lessons', 'Free'],
        ['intermediate','Technical Analysis','Charts, trends, support and resistance — read the market like a pro.', '14 lessons', 'Free'],
        ['advanced','Copy Trading Deep-Dive','Evaluate trader track records, risk scores and allocate like an expert.', '7 lessons', 'Free'],
        ['advanced','Portfolio Strategy','Risk management, rebalancing and building a long-term crypto portfolio.', '10 lessons', 'Free'],
    ];
@endphp
<section class="pv-section" style="padding-top:0">
    <div class="pv-container">
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Curriculum</p>
                <h2 class="pv-h2" style="font-size:1.7rem">Courses for every level</h2>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                <a href="#courses" class="pv-chip" style="padding:9px 18px">All</a>
                <a href="#courses" class="pv-chip pv-chip-blue" style="padding:9px 18px">Beginner</a>
                <a href="#courses" class="pv-chip pv-chip-gold" style="padding:9px 18px">Intermediate</a>
                <a href="#courses" class="pv-chip pv-chip-red" style="padding:9px 18px">Advanced</a>
            </div>
        </div>
        <div id="courses" class="pv-grid pv-grid-3" style="gap:18px">
            @foreach($courses as $c)
            <div class="pv-panel pv-card" style="padding:24px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <span class="pv-chip {{ $c[0]=='beginner'?'pv-chip-blue':($c[0]=='intermediate'?'pv-chip-gold':'pv-chip-red') }}">{{ ucfirst($c[0]) }}</span>
                    <h3 style="margin:14px 0 8px">{{ $c[1] }}</h3>
                    <p class="pv-foot" style="margin:0 0 18px;line-height:1.7">{{ $c[2] }}</p>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;padding-top:14px;border-top:1px solid var(--line)">
                    <span class="pv-mut" style="font-size:.82rem">📚 {{ $c[3] }}</span>
                    <span class="pv-chip pv-chip-gold">{{ $c[4] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:620px;margin:0 auto 38px">
            <p class="pv-tag" style="text-align:center">Daily Bit</p>
            <h2 class="pv-h2">Market insights, weekly</h2>
            <p class="pv-lead" style="margin:10px auto 0">A short email every Monday with the moves that matter — written by humans, not bots.</p>
        </div>
        <div class="pv-panel" style="padding:30px;max-width:520px;margin-inline:auto;text-align:center">
            <form id="subForm" style="display:flex;gap:10px">
                <input class="pv-input" type="email" name="email" placeholder="your@email.com" required>
                <button class="pv-btn" type="submit">Subscribe</button>
            </form>
            <div id="subOk" style="display:none;color:var(--acc);font-weight:600;margin-top:12px">✓ Subscribed! Check your inbox on Monday.</div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('subForm').addEventListener('submit',e=>{
        e.preventDefault();
        e.target.style.display='none';
        document.getElementById('subOk').style.display='block';
    });
</script>
@endpush