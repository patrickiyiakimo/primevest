@extends('layouts.dashboard')

@section('page-title', 'Deposit Funds')
@section('breadcrumb', 'Fund your trading account with crypto')

@section('dashboard-content')
@php
    $wallets = [
        ['BTC','Bitcoin','Network: Bitcoin (BTC)','bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh','#f7931a'],
        ['ETH','Ethereum','Network: ERC-20','0x71C7656EC7ab88b098defB751B7401B5f6d8976F','#8a92b2'],
        ['USDT','Tether TRC-20','Network: TRON (TRC-20)','TX7XpN394okDd3rFZag4v1xH3v9WZJQaCo','#26a17b'],
        ['SOL','Solana','Network: Solana','7YmM2ZvUGrfKXJq3ihQfC8gGKbQ2kBn3kXJb2mZv92oK','#9945ff'],
    ];
@endphp

<div class="grid-2">
    <div class="pa" style="padding:24px">
        <div class="sec-h">
            <div><h2>Make a Deposit</h2><p>Funds credit to your balance after confirmation</p></div>
        </div>

        <label class="lbl">Select payment method</label>
        <select class="inp sel" id="depositMethod" style="margin-bottom:16px">
            <option>Bitcoin (BTC)</option>
            <option selected>Ethereum (ETH)</option>
            <option>Tether (USDT – TRC20)</option>
            <option>Solana (SOL)</option>
            <option>USDC (ERC-20)</option>
            <option>Bank Transfer</option>
        </select>

        <label class="lbl">Amount (USD)</label>
        <input class="inp num" id="depositAmount" type="number" min="20" step="0.01" placeholder="e.g. 500.00" style="margin-bottom:8px">
        <div class="muted" style="font-size:.78rem;margin-bottom:16px">
            Min $20 · Max $100,000 · <span id="minedEq" class="gold num">≈ 0.1433 ETH</span>
        </div>

        <label class="lbl">Upload deposit proof <span class="muted" style="font-weight:400">(screenshot of transfer, optional)</span></label>
        <input class="inp" type="file" id="depositProof" accept="image/*,.pdf" style="margin-bottom:20px">

        <button class="btn btn-block" id="depositBtn" onclick="submitDeposit()">Submit Deposit Request</button>
        <div class="muted" style="font-size:.78rem;margin-top:12px;text-align:center">
            🔒 Your deposit request is reviewed within 15 minutes on business days.
        </div>
    </div>

    <div>
        <div class="pa" style="padding:22px;margin-bottom:18px">
            <div class="sec-h"><div><h2>Deposit Wallet Addresses</h2><p>Send crypto only to the matching network</p></div></div>
            @foreach($wallets as $w)
            <div style="display:flex;align-items:center;gap:12px;padding:13px;border:1px solid var(--line);border-radius:12px;margin-bottom:10px">
                <span style="font-size:.72rem;color:var(--muted)">{{ $w[1] }}</span>
                <span class="num" style="flex:1;font-size:.74rem;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis" title="{{ $w[3] }}">{{ $w[3] }}</span>
                <button class="btn btn-sm btn-ghost" onclick="copyAddr('{{ $w[3] }}')">Copy</button>
            </div>
            @endforeach
            <p class="muted" style="font-size:.76rem;margin:6px 0 0">⚠ Send funds only on the indicated network. Sending on the wrong network may result in permanent loss.</p>
        </div>
        <div class="pa" style="padding:22px;background:linear-gradient(140deg,#0d1d2e,#0c1322)">
            <div style="font-weight:800;margin-bottom:6px">💡 Pro tip</div>
            <p class="muted" style="margin:0;font-size:.86rem;line-height:1.7">
                Crypto deposits are instantly credited once the network confirms 1–3 blocks (usually &lt;10 min). USDT-TRC20 has the lowest fees — great for frequent top-ups.
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const fix=(n)=>(n||0).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:4});
    const rates={1:0.0001433,2:0.1433,3:0.5121,4:0.6562}; // per network
    function rateFor(){
        const m=document.getElementById('depositMethod').value.toLowerCase();
        if(m.includes('bitcoin'))return 0.00001433;
        if(m.includes('ethereum'))return 0.0002867;
        if(m.includes('usdt'))return 0.98;
        if(m.includes('solana'))return 0.0667;
        return 1;
    }
    function estEq(){
        const amt=parseFloat(document.getElementById('depositAmount').value)||0, r=rateFor();
        document.getElementById('minedEq').textContent='≈ '+fix(amt*r);
    }
    document.getElementById('depositAmount').addEventListener('input',estEq);
    document.getElementById('depositMethod').addEventListener('change',estEq);

    function submitDeposit(){
        const amount=document.getElementById('depositAmount').value;
        const method=document.getElementById('depositMethod').value;
        if(!amount||parseFloat(amount)<20){pvFlash('flash-err','Minimum deposit is $20');return}
        const fd=new FormData();
        fd.append('amount',amount);fd.append('method',method);
        const pf=document.getElementById('depositProof');
        if(pf.files[0])fd.append('proof',pf.files[0]);
        const btn=document.getElementById('depositBtn');
        btn.disabled=true;const old=btn.textContent;btn.textContent='Submitting…';
        const meta=document.querySelector('meta[name="csrf-token"]');
        fetch('{{ route('deposit.request') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json','X-CSRF-TOKEN':meta?meta.content:''}})
        .then(r=>r.json()).then(d=>{btn.disabled=false;btn.textContent=old;pvFlash(d.success?'flash-ok':'flash-err',d.message||'Processed');if(d.success)setTimeout(()=>location.reload(),1000)})
        .catch(()=>{btn.disabled=false;btn.textContent=old;pvFlash('flash-err','Network error. Please try again.')});
    }
    function copyAddr(addr){
        navigator.clipboard.writeText(addr).then(()=>pvFlash('flash-ok','Wallet address copied'));
    }
    estEq();
</script>
@endsection