@extends('layouts.dashboard')

@section('page-title', 'PrimeVest Card')
@section('breadcrumb', 'Spend your crypto balance worldwide')

@section('dashboard-content')
<div class="grid-2">
    <!-- Card preview -->
    <div style="display:flex;flex-direction:column;gap:18px">
        <div class="pa pv-shade" style="padding:20px">
            <div style="font-weight:800;margin-bottom:14px">Your PrimeVest Debit Card</div>
            <div style="border-radius:18px;padding:24px;background:linear-gradient(135deg,#0f2027,#203a43 50%,#2c5364);border:1px solid rgba(255,255,255,.12);box-shadow:0 30px 60px -30px rgba(0,0,0,.8)">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="width:auto;height:22px;display:block">
                    <span style="width:46px;height:30px;border-radius:6px;background:repeating-linear-gradient(45deg,#f0b90b,#f0b90b 6px,#e0a90a 6px,#e0a90a 12px)"></span>
                </div>
                <div class="num" style="font-size:1.15rem;letter-spacing:.14em;margin:26px 0 18px">•••• &nbsp;•&nbsp; •••• &nbsp;•&nbsp; •••• &nbsp;•&nbsp; 9021</div>
                <div style="display:flex;justify-content:space-between;font-size:.72rem">
                    <div><div class="muted" style="font-size:.62rem">CARDHOLDER</div><b>{{ strtoupper(substr(Auth::user()->name,0,18)) }}</b></div>
                    <div><div class="muted" style="font-size:.62rem">VALID THRU</div><b>09 / 29</b></div>
                    <div><div class="muted" style="font-size:.62rem">TYPE</div><b>VISA · GOLD</b></div>
                </div>
            </div>
            <div style="display:flex;gap:18px;margin-top:16px" class="num">
                <div><div class="muted" style="font-size:.68rem">Spend limit / day</div><b>$5,000</b></div>
                <div><div class="muted" style="font-size:.68rem">Physical delivery</div><b class="ok">Worldwide</b></div>
            </div>
        </div>
    </div>

    <!-- Application form -->
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Apply for a Card</h2><p>Requires a minimum balance of $2,000</p></div></div>
        <form id="cardForm">
            <div class="grid-2" style="grid-template-columns:1fr 1fr">
                <div>
                    <label class="lbl">Card type</label>
                    <select class="inp sel" name="card_type" style="margin-bottom:16px"><option value="visa">Visa</option><option value="mastercard">Mastercard</option></select>
                </div>
                <div>
                    <label class="lbl">Card tier</label>
                    <select class="inp sel" name="card_tier" style="margin-bottom:16px"><option value="gold">Gold</option><option value="platinum">Platinum</option></select>
                </div>
            </div>
            <label class="lbl">Delivery address</label>
            <textarea class="inp" name="delivery_address" rows="2" required style="margin-bottom:16px"></textarea>
            <label class="lbl">Phone number</label>
            <input class="inp" name="phone" required style="margin-bottom:16px">
            <label class="lbl">ID type</label>
            <select class="inp sel" name="id_type" style="margin-bottom:20px">
                <option value="passport">Passport</option>
                <option value="drivers_license">Driver's License</option>
                <option value="national_id">National ID</option>
            </select>
            <div style="display:flex;align-items:center;justify-content:center;gap:12px;background:rgba(47,123,255,.08);border:1px solid rgba(47,123,255,.25);border-radius:12px;padding:14px;margin-bottom:20px">
                <div class="lbl" style="margin:0">Balance: </div>
                <b class="num" style="color:var(--acc)">${{ number_format(Auth::user()->balance, 2) }}</b>
                <span class="muted" style="font-size:.8rem">/ $2,000 required</span>
            </div>
            <button type="submit" class="btn btn-block">Submit Card Application</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('cardForm').addEventListener('submit',e=>{
        e.preventDefault();
        const f=e.target,btn=f.querySelector('button[type=submit]');
        const fd=new FormData(f);
        const o=btn.textContent;btn.disabled=true;btn.textContent='Submitting…';
        const meta=document.querySelector('meta[name="csrf-token"]');
        fetch('{{ route('card-application.submit') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json','X-CSRF-TOKEN':meta?meta.content:''}})
        .then(r=>r.json()).then(d=>{btn.disabled=false;btn.textContent=o;pvFlash(d.success?'flash-ok':'flash-err',d.message||'Processed')})
        .catch(()=>{btn.disabled=false;btn.textContent=o;pvFlash('flash-err','Something went wrong. Please try again.')});
    });
</script>
@endsection