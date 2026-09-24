@extends('layouts.dashboard')

@section('page-title', 'Deposit Funds')
@section('breadcrumb', 'Fund your trading account with crypto')

@section('dashboard-content')
@php
    $wallets = [
        'BTC'  => ['label' => 'Bitcoin (BTC)',                 'network' => 'Bitcoin (BTC)',           'addr' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',      'color' => '#f7931a', 'logo' => asset('images/btc.png')],
        'ETH'  => ['label' => 'Ethereum (ETH)',                'network' => 'ERC-20',                  'addr' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',      'color' => '#8a92b2', 'logo' => asset('images/eth.png')],
        'USDT' => ['label' => 'Tether (USDT – TRC20)',         'network' => 'TRON (TRC-20)',           'addr' => 'TX7XpN394okDd3rFZag4v1xH3v9WZJQaCo',             'color' => '#26a17b', 'logo' => asset('images/Tron-logo.jfif')],
        'SOL'  => ['label' => 'Solana (SOL)',                  'network' => 'Solana',                  'addr' => '7YmM2ZvUGrfKXJq3ihQfC8gGKbQ2kBn3kXJb2mZv92oK',   'color' => '#9945ff', 'logo' => asset('images/solana-image.jfif')],
    ];
@endphp

<style>
    .pv-modal{position:fixed;inset:0;z-index:500;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(3,6,12,.68);backdrop-filter:blur(5px)}
    .pv-modal.open{display:flex}
    .pv-modal-card{width:100%;max-width:430px;background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:18px;padding:24px;box-shadow:0 40px 90px -30px rgba(0,0,0,.75);animation:mup .25s ease}
    @keyframes mup{from{opacity:0;transform:translateY(16px) scale(.98)}to{opacity:1;transform:none}}
    .wm-head{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:16px}
    .wm-badge{width:64px;height:64px;border-radius:16px;display:grid;place-items:center;font-size:1.7rem;background:rgba(47,123,255,.14);color:var(--acc);flex-shrink:0}
    .wm-badge img{width:46px;height:46px;object-fit:contain;border-radius:10px}
    .wm-x{background:none;border:0;color:var(--muted);font-size:1.6rem;line-height:1;cursor:pointer;padding:0 4px}
    .wm-x:hover{color:var(--text)}
    .wm-addr{font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:1.6;word-break:break-all;padding:14px;border-radius:12px;background:rgba(47,123,255,.07);border:1px dashed rgba(47,123,255,.35);color:var(--text);user-select:all;cursor:pointer}
</style>

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

    function keyFor(method){
        const m=method.toLowerCase();
        if(m.includes('bitcoin'))return 'BTC';
        if(m.includes('usdt')&&!m.includes('usdc'))return 'USDT';
        if(m.includes('solana'))return 'SOL';
        return 'ETH'; // Ethereum + USDC (ERC-20, same network)
    }

    const fix=(n)=>(n||0).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:4});
    function rateFor(){
        const m=document.getElementById('depositMethod').value.toLowerCase();
        if(m.includes('bitcoin'))return 0.00001433;
        if(m.includes('ethereum'))return 0.0002867;
        if(m.includes('usdt'))return 0.98;
        if(m.includes('solana'))return 0.0667;
        if(m.includes('bank')||m.includes('usdc'))return 1;
        return 1;
    }
    function estEq(){
        const amt=parseFloat(document.getElementById('depositAmount').value)||0, r=rateFor();
        const v='≈ '+fix(amt*r);
        document.getElementById('minedEq').textContent=v;
        const s=document.getElementById('sumEq');if(s)s.textContent=v;
    }
    function syncMethod(){
        const method=document.getElementById('depositMethod').value;
        const isBank=method.toLowerCase().includes('bank');
        const w=isBank?null:WALLETS[keyFor(method)];
        document.getElementById('sumMethod').textContent=method;
        document.getElementById('sumNetwork').textContent=isBank?'Bank transfer':('Network: '+w.network);
        document.getElementById('walletBtn').textContent=isBank?'View Wire Instructions':'Get Deposit Wallet Address';
        const sl=document.getElementById('sumLogo');
        if(isBank){sl.style.display='none'}else{sl.src=w.logo;sl.style.display='inline-block'}
    }
    document.getElementById('depositAmount').addEventListener('input',estEq);
    document.getElementById('depositMethod').addEventListener('change',()=>{estEq();syncMethod()});

    function openWalletModal(){
        const method=document.getElementById('depositMethod').value;
        const isBank=method.toLowerCase().includes('bank');
        const logo=document.getElementById('wmLogo');
        const glyph=document.getElementById('wmGlyph');
        document.getElementById('wmBank').style.display=isBank?'block':'none';
        document.getElementById('wmWallet').style.display=isBank?'none':'block';
        if(!isBank){
            const base=method.split(' (')[0];
            const w=WALLETS[keyFor(method)];
            document.getElementById('wmTitle').textContent='Deposit '+base;
            document.getElementById('wmNetwork').textContent='Network: '+w.network;
            document.getElementById('wmAddr').textContent=w.addr;
            currentAddr=w.addr;
            logo.src=w.logo;logo.style.display='block';glyph.style.display='none';
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

    estEq();
    syncMethod();
</script>
@endsection