@extends('layouts.app')

@section('title', 'About PrimeVest · Our Company')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:1020px">
        <div style="text-align:center">
            <p class="pv-tag" style="text-align:center">Who we are</p>
            <h1 class="pv-h1">Built for the new era of digital wealth</h1>
            <p class="pv-lead" style="margin:16px auto 0">PrimeVest is a regulated digital asset platform connecting everyday investors to crypto markets, staking and elite copy-trading strategies.</p>
        </div>

        <div class="pv-stats" style="margin-top:46px">
            <div class="pv-stat"><b class="num accent-green" style="color:var(--acc)">$2.4B</b><span>Trading volume</span></div>
            <div class="pv-stat"><b class="num">1.8M+</b><span>Registered investors</span></div>
            <div class="pv-stat"><b class="num">190+</b><span>Countries served</span></div>
            <div class="pv-stat"><b class="num" style="color:var(--gold)">94%</b><span>Client retention</span></div>
        </div>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container pv-grid pv-grid-2" style="gap:22px">
        <div class="pv-panel" style="padding:30px">
            <h2 class="pv-h2" style="font-size:1.5rem">Our mission</h2>
            <p class="pv-mut" style="margin:0;line-height:1.8">We believe financial freedom should not be reserved for the few. PrimeVest exists to give every investor — regardless of background — access to institutional-grade crypto tools, transparent performance data and strategies that historically belonged only to fund managers.</p>
        </div>
        <div class="pv-panel" style="padding:30px">
            <h2 class="pv-h2" style="font-size:1.5rem">Our vision</h2>
            <p class="pv-mut" style="margin:0;line-height:1.8">A world where digital assets are a mainstream, trusted part of every household portfolio. We are building the bridge between traditional finance and the decentralised future — securely, transparently and for everyone.</p>
        </div>
    </div>
</section>

<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:620px;margin:0 auto 42px">
            <p class="pv-tag" style="text-align:center">Milestones</p>
            <h2 class="pv-h2">The PrimeVest journey</h2>
        </div>
        <div class="pv-grid pv-grid-3" style="gap:18px">
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip pv-chip-gold">2018</div><h3 style="margin:14px 0 8px">Platform launched</h3><p class="pv-foot" style="margin:0;line-height:1.7">PrimeVest opens its doors with just 3 cryptocurrencies and a founding team of 12.</p></div>
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip pv-chip-blue">2020</div><h3 style="margin:14px 0 8px">Copy trading goes live</h3><p class="pv-foot" style="margin:0;line-height:1.7">We pioneer verified-performance copy trading, giving retail investors pro-level access.</p></div>
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip">2022</div><h3 style="margin:14px 0 8px">1M investors</h3><p class="pv-foot" style="margin:0;line-height:1.7">Community grows past one million across 140 countries — our most ambitious year.</p></div>
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip pv-chip-gold">2023</div><h3 style="margin:14px 0 8px">Staking &amp; real estate</h3><p class="pv-foot" style="margin:0;line-height:1.7">Tokenised staking vaults and real-estate funds join the product family.</p></div>
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip pv-chip-blue">2024</div><h3 style="margin:14px 0 8px">Global regulation</h3><p class="pv-foot" style="margin:0;line-height:1.7">Licences secured in key EU and UK jurisdictions. Fiat on-ramps across 30 currencies.</p></div>
            <div class="pv-panel pv-card" style="padding:24px"><div class="pv-chip">2026</div><h3 style="margin:14px 0 8px">Today</h3><p class="pv-foot" style="margin:0;line-height:1.7">1.8M investors, $2.4B volume and a roadmap full of what's next. This is only the beginning.</p></div>
        </div>
    </div>
</section>

<section class="pv-section">
    <div class="pv-container" style="text-align:center">
        <h2 class="pv-h2">The people behind the platform</h2>
        <p class="pv-lead" style="margin:10px auto 34px">A leadership team with roots in fintech, institutional trading and cybersecurity.</p>
        <div class="pv-grid pv-grid-4" style="gap:18px">
            @foreach([
                ['PI','Patrick Iyiakimo','Founder & CEO'],
                ['ET','Elena Torres','Chief Investment Officer'],
                ['JK','James Kola','Chief Technology Officer'],
                ['MT','Maya Thompson','Head of Security'],
            ] as $m)
            <div class="pv-panel pv-card" style="padding:22px;text-align:center">
                <div style="width:64px;height:64px;margin:0 auto;border-radius:50%;background:linear-gradient(135deg,var(--acc2),var(--acc));display:grid;place-items:center;font-weight:800;color:#04140d;font-size:1.2rem">{{ $m[0] }}</div>
                <h3 style="margin:14px 0 4px;font-size:1rem">{{ $m[1] }}</h3>
                <p class="pv-mut" style="margin:0;font-size:.82rem">{{ $m[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection