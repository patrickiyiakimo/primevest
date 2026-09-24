@extends('layouts.dashboard')

@section('page-title', 'Verify Your Identity')
@section('breadcrumb', 'Complete KYC to unlock higher limits')

@section('dashboard-content')
<div class="grid-2">
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Identity Verification</h2><p>Upload a government-issued document</p></div></div>

        <form method="POST" action="{{ route('kyc.submit') }}" enctype="multipart/form-data">
            @csrf
            <label class="lbl">Document type</label>
            <select class="inp sel" name="document_type" style="margin-bottom:16px">
                <option value="passport">Passport</option>
                <option value="drivers_license">Driver's License</option>
                <option value="national_id">National ID Card</option>
            </select>

            <label class="lbl">Front side / photo page</label>
            <input class="inp" type="file" name="document_front" accept="image/*" required style="margin-bottom:16px">

            <label class="lbl">Back side <span class="muted">(optional)</span></label>
            <input class="inp" type="file" name="document_back" accept="image/*" style="margin-bottom:20px">

            <button class="btn btn-block" type="submit">Submit for Review</button>
            <p class="muted" style="font-size:.76rem;margin-top:12px;text-align:center">
                🔒 Documents are encrypted and reviewed by our compliance team within 24–48 hours.
            </p>
        </form>
    </div>

    <div>
        <div class="pa" style="padding:22px;margin-bottom:18px">
            <div class="sec-h"><div><h2>Why KYC?</h2></div></div>
            <div style="display:flex;gap:14px;align-items:flex-start;margin-bottom:16px">
                <div class="num" style="font-weight:800;color:var(--acc)">01</div>
                <div><b>Regulatory compliance</b><div class="muted" style="font-size:.83rem">Required by our financial partners and regulators to combat fraud and money laundering.</div></div>
            </div>
            <div style="display:flex;gap:14px;align-items:flex-start;margin-bottom:16px">
                <div class="num" style="font-weight:800;color:var(--acc)">02</div>
                <div><b>Higher limits</b><div class="muted" style="font-size:.83rem">Verified users unlock higher deposit and withdrawal limits.</div></div>
            </div>
            <div style="display:flex;gap:14px;align-items:flex-start">
                <div class="num" style="font-weight:800;color:var(--acc)">03</div>
                <div><b>Account protection</b><div class="muted" style="font-size:.83rem">Verification prevents account takeovers and keeps your funds safe.</div></div>
            </div>
        </div>
        <div class="pa pv-shade" style="padding:22px">
            <div style="font-weight:800;margin-bottom:6px">🛡 Your privacy</div>
            <p class="muted" style="margin:0;font-size:.86rem;line-height:1.7">We only ask for what the law requires. Your KYC data is never shared, sold or used for marketing.</p>
        </div>
    </div>
</div>
@endsection