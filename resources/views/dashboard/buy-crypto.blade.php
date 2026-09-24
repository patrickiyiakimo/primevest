@extends('layouts.dashboard')

@section('page-title', 'Buy Crypto')
@section('breadcrumb')
    <a href="{{ route('dashboard') }}" style="color:inherit;text-decoration:none">← Back</a>
@endsection

@section('dashboard-content')
@php
    $steps = [
        ['Choose Your Preferred Payment Option', 'Choose your preferred payment option from the list provided, such as PayPal, Venmo, Zelle, Cashapp, or Bank transfer.'],
        ['Connect with a Verified Crypto Seller', 'Connect with a verified crypto seller on our platform. Rest assured that all merchants offering these payment services are registered and verified under our platform, ensuring the safety of your funds.'],
        ['Confirm Crypto Availability', 'We would confirm that the selected payment option is available for the seller and confirm their availability to sell the required amount of crypto for your funding.'],
        ['Merchant Details Submission', 'The seller submits their payment details to our system, and we promptly forward these details to you for your convenience.'],
        ['Secure Payment Window', 'A 30-minute timeframe is established to ensure a smooth experience for all investors. During this window, you are encouraged to complete your payment.'],
        ['Crypto Held in Escrow', 'Upon your confirmation of the payment, the specified amount of cryptocurrency is securely held in escrow for the designated 30-minute period. This ensures a seamless transaction process for both parties involved.'],
        ['Confirm Payment', 'After making your payment, notify our system to confirm the successful transaction with a receipt or screenshot within the 30-minute window.'],
        ['Payment Verification', 'Our system verifies the payment made within the stipulated time frame to ensure accuracy and security.'],
        ['Crypto Delivery', 'Once payment is confirmed, the purchased cryptocurrency is promptly deposited into your wallet, providing you with immediate access to your asset.'],
        ['Transaction Fee', 'Please note that a flat transaction fee of $25 applies to every payment processed, regardless of the transaction amount. This fee helps maintain the efficiency and security of our payment process.'],
    ];
    $methods = [
        ['🏦', 'Zelle', 'Bank-to-bank instant transfer'],
        ['💳', 'Venmo', 'Send and receive with the Venmo app'],
        ['💵', 'Cashapp', 'Quick payments with Cash App'],
        ['🅿️', 'PayPal', 'Secure PayPal transactions'],
        ['🏛️', 'Wire Bank Transfer', 'Direct wire transfer from your bank'],
    ];
@endphp

<style>
    .pv-modal{position:fixed;inset:0;z-index:999;display:none;align-items:center;justify-content:center;padding:16px;background:rgba(3,6,12,.72);backdrop-filter:blur(8px)}
    .pv-modal.open{display:flex}
    .paym-card{width:min(460px,100%);background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:20px;padding:26px;box-shadow:0 40px 80px -40px rgba(0,0,0,.8)}
    .paym-x{background:none;border:none;color:var(--muted);font-size:1.4rem;line-height:1;cursor:pointer;padding:0 2px}
    .paym-x:hover{color:var(--text)}
    .paym-item{display:flex;align-items:center;gap:13px;padding:14px 15px;border:1px solid var(--line);border-radius:13px;cursor:pointer;background:rgba(255,255,255,.03);transition:.2s}
    .paym-item:hover{border-color:rgba(47,123,255,.5)}
    .paym-item:has(input:checked){border-color:var(--acc);background:rgba(47,123,255,.1)}
    .paym-item input{accent-color:var(--acc);width:18px;height:18px;flex-shrink:0}
    .paym-ico{width:36px;height:36px;border-radius:10px;background:rgba(255,255,255,.07);display:grid;place-items:center;font-size:1.05rem;flex-shrink:0}
    .step{display:flex;gap:15px;padding:16px;border:1px solid var(--line);border-radius:14px;background:rgba(255,255,255,.025)}
    .step-n{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#57c8ff,#2f7bff);color:#04121f;display:grid;place-items:center;font-weight:800;font-size:.85rem;flex-shrink:0}
</style>

<div class="pa" style="padding:26px">
    <div class="sec-h">
        <div><h2>Welcome to the Peer-to-Peer Crypto Investment Payment Guide</h2></div>
    </div>

    <div style="font-size:.93rem;line-height:1.75;color:var(--muted)">
        <p style="margin:0 0 14px"><b style="color:var(--text)">Introduction:</b><br>
        At Cap crypto Investment, we are committed to providing you with a seamless and user-friendly experience as you embark on your cryptocurrency investment journey. We understand that navigating the world of cryptocurrencies and payments can sometimes be challenging. To make things simpler, we are excited to introduce our new peer-to-peer payment method, designed to offer you a convenient and secure way to invest in crypto.</p>
        <p style="margin:0 0 22px">Our peer-to-peer payment method allows you to use well-known payment platforms such as PayPal, Venmo, Zelle, and Bank transfer, ensuring that you can easily fund your investment without any hassles. Rest assured, the individuals offering these payment services are registered and verified under our platform, guaranteeing the safety of your funds.</p>
    </div>

    <div style="font-weight:800;font-size:1.05rem;margin-bottom:16px">Step-by-Step Guide:</div>

    <div style="display:grid;gap:12px">
        @foreach($steps as $i => $s)
        <div class="step">
            <div class="step-n">{{ $i + 1 }}</div>
            <div>
                <div style="font-weight:700;font-size:.95rem;margin-bottom:3px">{{ $s[0] }}</div>
                <div class="muted" style="font-size:.86rem;line-height:1.6">{{ $s[1] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div style="font-size:.93rem;line-height:1.75;color:var(--muted);margin-top:22px">
        <p style="margin:0 0 14px">We understand the importance of simplifying the investment process for our valued customers. This peer-to-peer payment method allows you to use familiar payment platforms while ensuring the safety of your funds and the efficient delivery of your chosen cryptocurrency. If you have any questions or need assistance, our dedicated live support team is here to help.</p>
        <p style="margin:0 0 20px">Thank you for choosing our platform for your crypto investment needs. We look forward to helping you achieve your financial goals.</p>
        <div style="margin-top:18px;font-weight:800;color:#fff">Warm regards,</div>
    </div>

    <button class="btn btn-block" style="margin-top:26px" onclick="openPayModal()">Next →</button>
</div>

<!-- Accepted Payment Methods Modal -->
<div id="payModal" class="pv-modal" onclick="if(event.target===this)closePayModal()">
    <div class="paym-card">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:18px">
            <div>
                <div style="font-weight:800;font-size:1.15rem">Accepted Payment Methods</div>
                <div class="muted" style="font-size:.82rem;margin-top:3px">Choose the method you'll use to fund your purchase</div>
            </div>
            <button class="paym-x" onclick="closePayModal()" aria-label="Close">×</button>
        </div>
        <div style="display:grid;gap:11px">
            @foreach($methods as $m)
            <label class="paym-item">
                <input type="radio" name="payMethod" value="{{ $m[1] }}"
                    @if($loop->first) checked @endif>
                <span class="paym-ico">{{ $m[0] }}</span>
                <span style="flex:1;min-width:0">
                    <span style="display:block;font-weight:700;font-size:.93rem">{{ $m[1] }}</span>
                    <span class="muted" style="display:block;font-size:.76rem;margin-top:1px">{{ $m[2] }}</span>
                </span>
            </label>
            @endforeach
        </div>
        <button class="btn btn-block" style="margin-top:18px" onclick="confirmPay()">Continue</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openPayModal(){document.getElementById('payModal').classList.add('open')}
    function closePayModal(){document.getElementById('payModal').classList.remove('open')}
    function confirmPay(){
        const sel=document.querySelector('input[name="payMethod"]:checked');
        closePayModal();
        if(typeof pvFlash==='function'){
            pvFlash('flash-ok',(sel?sel.value:'Selected method')+' selected — our team will contact you shortly.');
        }
    }
    document.addEventListener('keydown',(e)=>{if(e.key==='Escape')closePayModal()});
</script>
@endsection