@extends('layouts.app')

@section('title', 'Privacy Policy · PrimeVest')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:820px">
        <p class="pv-tag">Legal</p>
        <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.4rem)">Privacy Policy</h1>
        <p class="pv-lead" style="margin:12px 0 0">Last updated: January 2026</p>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container" style="max-width:820px">
        <div class="pv-panel" style="padding:34px">
            @foreach([
                ['1. What we collect','We collect the information you provide when you register — your name, email, phone and country — plus your transaction history (deposits, withdrawals, trades and staking) and verification documents for KYC compliance.'],
                ['2. How we use it','Your data powers your account: executing trades, processing withdrawals, preventing fraud and meeting legal obligations. We may also send you service updates and (with consent) market insights.'],
                ['3. Sharing','We never sell your data. We share it only with regulated processors who help run the platform (payments, KYC providers, hosting) under strict confidentiality agreements.'],
                ['4. Data protection','All data is encrypted in transit (TLS) and at rest. Access is limited to trained staff, and we apply the principle of least privilege across our systems.'],
                ['5. Data retention','We keep personal data only as long as your account is active, plus the retention periods required by financial regulation (typically 5 years after closure).'],
                ['6. Your rights','Under GDPR and similar laws you may request a copy of your data, correct inaccuracies, restrict processing or delete your account. Contact support@primevest.io to exercise these rights.'],
                ['7. Cookies','We use essential cookies for login sessions and security. Optional analytics cookies are used only with your consent, and you can change preferences at any time.'],
                ['8. Children','PrimeVest is a professional financial service. We do not knowingly collect data from anyone under 18 years of age.'],
                ['9. Changes','We may update this policy as our services evolve. Significant changes will be announced by email at least 14 days before taking effect.'],
                ['10. Contact','Privacy questions? Email our Data Protection team at privacy@primevest.io or write to 1 Canada Square, Canary Wharf, London E14 5AB, United Kingdom.'],
            ] as $s)
            <div style="margin-bottom:26px">
                <h3 style="margin:0 0 8px;font-size:1.05rem">{{ $s[0] }}</h3>
                <p class="pv-mut" style="margin:0;line-height:1.8;font-size:.94rem">{{ $s[1] }}</p>
            </div>
            @endforeach
        </div>
        <p class="pv-foot" style="text-align:center;margin-top:24px">PrimeVest Technologies Ltd · Registered in England &amp; Wales No. 11845210</p>
    </div>
</section>
@endsection