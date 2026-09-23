@extends('layouts.app')

@section('title', 'Contact Us · PrimeVest')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:1080px">
        <div style="text-align:center">
            <p class="pv-tag" style="text-align:center">24/7 Support</p>
            <h1 class="pv-h2" style="font-size:clamp(1.9rem,3.6vw,2.8rem)">We're here for you, always</h1>
            <p class="pv-lead" style="max-width:560px;margin:12px auto 0">Questions about deposits, withdrawals or anything else? Our team replies within 24 hours.</p>
        </div>

        <div class="pv-grid pv-grid-3" style="gap:18px;margin:36px auto 0;max-width:960px">
            <div class="pv-panel pv-card" style="padding:22px;text-align:center">
                <div style="font-size:1.8rem">📧</div>
                <h3 style="margin:10px 0 6px">Email support</h3>
                <p class="pv-mut" style="font-size:.9rem">support@primevest.io</p>
            </div>
            <div class="pv-panel pv-card" style="padding:22px;text-align:center">
                <div style="font-size:1.8rem">🚨</div>
                <h3 style="margin:10px 0 6px">Priority line</h3>
                <p class="pv-mut" style="font-size:.9rem">For issues over $10,000 — reply within 2h</p>
            </div>
            <div class="pv-panel pv-card" style="padding:22px;text-align:center">
                <div style="font-size:1.8rem">💬</div>
                <h3 style="margin:10px 0 6px">Live chat</h3>
                <p class="pv-mut" style="font-size:.9rem">Mon–Fri, 9:00–18:00 UTC</p>
            </div>
        </div>

        <div class="pv-grid pv-grid-2" style="gap:20px;margin-top:20px;max-width:960px;margin-left:auto;margin-right:auto">
            <div class="pv-panel" style="padding:28px">
                <h2 class="pv-h2" style="font-size:1.4rem;margin-bottom:18px">Send us a message</h2>
                <form id="contactForm">
                    <input class="pv-input" name="name" placeholder="Your name" required style="margin-bottom:14px">
                    <input class="pv-input" name="email" type="email" placeholder="Your email" required style="margin-bottom:14px">
                    <select class="pv-input pv-select" name="topic" style="margin-bottom:14px">
                        <option>General question</option>
                        <option>Deposit help</option>
                        <option>Withdrawal help</option>
                        <option>Account / security</option>
                        <option>Staking plans</option>
                    </select>
                    <textarea class="pv-input" name="message" rows="5" placeholder="How can we help?" required style="margin-bottom:18px"></textarea>
                    <button class="pv-btn pv-btn-block" type="submit">Send Message</button>
                    <div id="contactOk" style="display:none;margin-top:14px;text-align:center;color:var(--acc);font-weight:600">✓ Thanks! We'll reply within 24 hours.</div>
                </form>
            </div>
            <div>
                <div class="pv-panel" style="padding:26px;margin-bottom:18px">
                    <h3 style="margin-bottom:6px">📍 Visit our office</h3>
                    <p class="pv-mut" style="line-height:1.8;margin:0">1 Canada Square<br>Canary Wharf, London<br>E14 5AB, United Kingdom</p>
                </div>
                <div class="pv-panel" style="padding:26px">
                    <h3 style="margin-bottom:6px">🕘 Support hours</h3>
                    <div class="pv-mut" style="line-height:1.9;margin:0">
                        Mon – Fri: 09:00 – 20:00 UTC<br>
                        Sat – Sun: 10:00 – 16:00 UTC<br>
                        <b style="color:var(--acc)">Urgent: 24/7 for priority clients</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const fEl=document.getElementById('contactForm');
    fEl.addEventListener('submit',e=>{
        e.preventDefault();
        fEl.style.display='none';
        document.getElementById('contactOk').style.display='block';
    });
</script>
@endpush