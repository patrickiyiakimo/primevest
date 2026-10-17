@extends('layouts.dashboard')

@section('page-title', 'Deposit Funds')
@section('breadcrumb', 'Fund your trading account with crypto')

@section('dashboard-content')
@php
    $wallets = $wallets ?? collect();
@endphp

<style>
    .pv-modal{position:fixed;inset:0;z-index:500;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(3,6,12,.68);backdrop-filter:blur(5px)}
    .pv-modal.open{display:flex}
    .pv-modal-card{width:100%;max-width:430px;background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:18px;padding:24px;box-shadow:0 40px 90px -30px rgba(0,0,0,.75);animation:mup .25s ease}
    @keyframes mup{from{opacity:0;transform:translateY(16px) scale(.98)}to{opacity:1;transform:none}}
    .wm-head{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:16px}
    .wm-badge{width:64px;height:64px;border-radius:16px;display:grid;place-items:center;font-size:1.7rem;background:rgba(59,130,246,.14);color:var(--acc);flex-shrink:0}
    .wm-badge img{width:46px;height:46px;object-fit:contain;border-radius:10px}
    .wm-x{background:none;border:0;color:var(--muted);font-size:1.6rem;line-height:1;cursor:pointer;padding:0 4px}
    .wm-x:hover{color:var(--text)}
    .wm-addr{font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.6;word-break:break-all;padding:14px;border-radius:12px;background:rgba(59,130,246,.07);border:1px dashed rgba(59,130,246,.35);color:var(--text);user-select:all;cursor:pointer}
    .pv-coins{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-bottom:18px}
    .pv-coin{display:flex;align-items:center;gap:10px;padding:11px 12px;border:1px solid var(--line);border-radius:12px;background:var(--panel2);cursor:pointer;text-align:left;font-family:inherit;transition:.18s;color:var(--text);width:100%}
    .pv-coin:hover{border-color:rgba(59,130,246,.45);transform:translateY(-1px)}
    .pv-coin.on{border-color:var(--acc);background:rgba(59,130,246,.08);box-shadow:0 0 0 3px rgba(59,130,246,.12)}
    .pv-coin-logo{width:30px;height:30px;border-radius:8px;display:grid;place-items:center;flex-shrink:0;background:rgba(59,130,246,.10);overflow:hidden}
    .pv-coin-logo img{width:22px;height:22px;object-fit:contain}
    .pv-coin-logo i{font-size:1.15rem;color:var(--acc)}
    .pv-coin-text{min-width:0;display:flex;flex-direction:column}
    .pv-coin-name{font-weight:700;font-size:.82rem;line-height:1.25;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .pv-coin-net{font-size:.68rem;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
</style>

<div class="grid-2">
    <div class="pa" style="padding:24px">
        <div class="sec-h">
            <div><h2>Make a Deposit</h2><p>Funds credit to your balance after confirmation</p></div>
        </div>

        <label class="lbl">Select payment method</label>
        <div class="pv-coins" id="coinGrid">
            @foreach($wallets as $coin => $w)
                <button type="button" class="pv-coin @if($coin === 'ETH') on @endif" data-coin="{{ $coin }}" data-label="{{ $w['label'] }}" onclick="pickCoin(this)">
                    <span class="pv-coin-logo">
                        @if($w['logo'])<img src="{{ $w['logo'] }}" alt="">@else<i class="mdi mdi-currency-usd"></i>@endif
                    </span>
                    <span class="pv-coin-text">
                        <span class="pv-coin-name">{{ $w['label'] }}</span>
                        <span class="pv-coin-net">{{ $w['network'] ?: '—' }}</span>
                    </span>
                </button>
            @endforeach
        </div>

        <label class="lbl">Amount (USD)</label>
        <input class="inp num" id="depositAmount" type="number" min="300" step="0.01" placeholder="e.g. 500.00" style="margin-bottom:8px">
        <div class="muted" style="font-size:.78rem;margin-bottom:16px">
            Min $300 · Max $100,000 · <span id="minedEq" class="gold num">≈ 0.1433 ETH</span>
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
            <div class="sec-h"><div><h2>Deposit Details</h2><p>Your crypto top-up at a glance</p></div></div>
            <div style="display:grid;gap:9px;font-size:.86rem;margin-bottom:16px">
                <div style="display:flex;justify-content:space-between;gap:12px;align-items:center"><span class="muted">Method</span><b id="sumMethodWrap" style="display:inline-flex;align-items:center;gap:8px"><img id="sumLogo" src="{{ asset('images/eth.png') }}" alt="" style="width:26px;height:26px;object-fit:contain"><span id="sumMethod">Ethereum (ETH)</span></b></div>
                <div style="display:flex;justify-content:space-between;gap:12px"><span class="muted">Network</span><b id="sumNetwork">Network: ERC-20</b></div>
                <div style="display:flex;justify-content:space-between;gap:12px"><span class="muted">Est. amount</span><b id="sumEq" class="gold num">≈ 0.1433 ETH</b></div>
            </div>
            <button class="btn btn-block" style="width:100%" id="walletBtn" onclick="openWalletModal()">⛓ Get Deposit Wallet Address</button>
            <p class="muted" style="font-size:.75rem;margin:10px 4px 0;text-align:left;line-height:1.6">
                🔒 Wallet addresses are revealed on demand — click above to view yours securely.
            </p>
        </div>
        <div class="pa pv-shade" style="padding:22px">
            <div style="font-weight:800;margin-bottom:6px">💡 Pro tip</div>
            <p class="muted" style="margin:0;font-size:.86rem;line-height:1.7">
                Crypto deposits are instantly credited once the network confirms 1–3 blocks (usually &lt;10 min). USDT-TRC20 has the lowest fees — great for frequent top-ups.
            </p>
        </div>
    </div>
</div>

<!-- Wallet address modal -->
<div class="pv-modal" id="walletModal" onclick="if(event.target===this)closeWalletModal()">
    <div class="pv-modal-card">
        <div class="wm-head">
            <div style="display:flex;align-items:center;gap:12px">
                <span class="wm-badge"><img id="wmLogo" alt="" style="display:none"><span id="wmGlyph">⛓</span></span>
                <div>
                    <div style="font-weight:800;font-size:1.05rem" id="wmTitle">Deposit Ethereum</div>
                    <div class="muted" style="font-size:.75rem" id="wmNetwork">Network: ERC-20</div>
                </div>
            </div>
            <button class="wm-x" onclick="closeWalletModal()" aria-label="Close">×</button>
        </div>
        <div id="wmBank" style="display:none">
            <p class="muted" style="font-size:.9rem;line-height:1.7;margin:4px 0 14px">
                Bank wire instructions are delivered securely by our finance team once your transfer request is reviewed. Submit your deposit request below and we'll follow up within minutes.
            </p>
            <button class="btn btn-block" style="width:100%" onclick="closeWalletModal()">Got it</button>
        </div>
        <div id="wmWallet" style="display:none">
            <div style="display:flex;align-items:center;gap:8px;margin:2px 0 12px">
                <span class="pill pill-g">● Secure address</span>
                <span class="muted" style="font-size:.72rem">Private &amp; encrypted view</span>
            </div>
            <div class="wm-addr" id="wmAddr" onclick="copyWallet()"></div>
            <div style="display:flex;gap:10px;margin-top:12px">
                <button class="btn" style="flex:1" onclick="copyWallet()">Copy Address</button>
                <button class="btn btn-ghost" style="flex:1" onclick="closeWalletModal()">Close</button>
            </div>
            <p class="muted" style="font-size:.74rem;margin:12px 4px 0;line-height:1.6">⚠ Send funds only on the indicated network. Sending on the wrong network may result in permanent loss.</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const WALLETS = @json($wallets);
    let currentAddr='';

    function activeTile(){
        return document.querySelector('.pv-coin.on');
    }
    function currentCoin(){
        const t=activeTile();
        return t?t.dataset.coin:'';
    }
    function currentMethod(){
        const t=activeTile();
        return t?t.dataset.label:'';
    }
    function pickCoin(btn){
        document.querySelectorAll('.pv-coin').forEach(b=>b.classList.remove('on'));
        btn.classList.add('on');
        estEq(); syncMethod();
    }
    function currentWallet(){
        const w=WALLETS[currentCoin()];
        if(w&&w.addr)return w;
        return WALLETS['ETH']||null; // unknown coins share the ERC-20 address
    }

    const fix=(n)=>(n||0).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:4});
    function rateFor(){
        var coin=currentCoin();
        if(coin.indexOf('USDT')===0)return 0.98;
        switch(coin){
            case 'BTC':return 0.00001433;
            case 'ETH':return 0.0002867;
            case 'SOL':return 0.0667;
            default:return 1;
        }
    }
    function currentSymbol(){
        const c=currentCoin();
        if(c==='BANK')return '';
        return c.replace('_ERC20','');
    }
    function estEq(){
        const amt=parseFloat(document.getElementById('depositAmount').value)||0, r=rateFor();
        const sym=currentSymbol();
        const v='≈ '+fix(amt*r)+(sym?' '+sym:'');
        document.getElementById('minedEq').textContent=v;
        const s=document.getElementById('sumEq');if(s)s.textContent=v;
    }
    function syncMethod(){
        const method=currentMethod();
        const isBank=currentCoin()==='BANK';
        const w=isBank?null:currentWallet();
        document.getElementById('sumMethod').textContent=method||'—';
        document.getElementById('sumNetwork').textContent=isBank?'Bank transfer':('Network: '+(w&&w.network?w.network:'—'));
        document.getElementById('walletBtn').textContent=isBank?'View Wire Instructions':'Get Deposit Wallet Address';
        const sl=document.getElementById('sumLogo');
        if(isBank||!w||!w.logo){sl.style.display='none'}else{sl.src=w.logo;sl.style.display='inline-block'}
    }
    document.getElementById('depositAmount').addEventListener('input',estEq);

    function openWalletModal(){
        const method=currentMethod();
        const isBank=currentCoin()==='BANK';
        const logo=document.getElementById('wmLogo');
        const glyph=document.getElementById('wmGlyph');
        document.getElementById('wmBank').style.display=isBank?'block':'none';
        document.getElementById('wmWallet').style.display=isBank?'none':'block';
        if(!isBank){
            const base=method.split(' (')[0];
            const w=currentWallet();
            document.getElementById('wmTitle').textContent='Deposit '+base;
            document.getElementById('wmNetwork').textContent='Network: '+(w&&w.network?w.network:'—');
            document.getElementById('wmAddr').textContent=w?w.addr:'';
            currentAddr=w?w.addr:'';
            if(w&&w.logo){logo.src=w.logo;logo.style.display='block';glyph.style.display='none';}
            else{logo.style.display='none';glyph.style.display='block';}
        } else {
            document.getElementById('wmTitle').textContent='Bank Transfer';
            document.getElementById('wmNetwork').textContent='Wire instructions';
            logo.style.display='none';glyph.style.display='block';
        }
        document.getElementById('walletModal').classList.add('open');
    }
    function closeWalletModal(){
        document.getElementById('walletModal').classList.remove('open');
    }
    function copyWallet(){
        if(!currentAddr)return;
        navigator.clipboard.writeText(currentAddr).then(()=>pvFlash('flash-ok','Wallet address copied'));;
    }
    document.addEventListener('keydown',(e)=>{if(e.key==='Escape')closeWalletModal()});

    function submitDeposit(){
        const amount=document.getElementById('depositAmount').value;
        const method=currentMethod();
        if(!method){pvFlash('flash-err','Please select a payment method');return}
        if(!amount||parseFloat(amount)<300){pvFlash('flash-err','Minimum deposit is $300');return}
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

    estEq();
    syncMethod();
</script>
@endsection