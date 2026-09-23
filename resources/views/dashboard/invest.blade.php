@extends('layouts.dashboard')

@section('page-title', 'Staking Plans')
@section('breadcrumb', 'Earn daily rewards by staking your crypto')

@section('dashboard-content')
<div class="pa" style="padding:22px;background:linear-gradient(140deg,#10221d,#0c1322);margin-bottom:24px">
    <div style="display:flex;flex-wrap:wrap;align-items:center;gap:20px">
        <div style="flex:1;min-width:220px">
            <div style="font-weight:800;font-size:1.2rem">Choose a staking plan</div>
            <div class="muted" style="font-size:.84rem">Pick a plan, enter your stake and start earning daily returns paid straight into your balance.</div>
        </div>
        <div style="display:flex;gap:26px" class="num">
            <div><div class="muted" style="font-size:.72rem">Daily rewards</div><div style="font-weight:800" class="gold">7d/week</div></div>
            <div><div class="muted" style="font-size:.72rem">Flexible exit</div><div style="font-weight:800" class="ok">Yes</div></div>
        </div>
    </div>
</div>

@php
    $plans = [
        ['Starter Staking',250,10,7,'Focus on BTC & ETH','Ideal for first-time investors'],
        ['Silver Staking',1000,15,14,'Plus SOL & BNB','Balanced growth portfolio'],
        ['Gold Staking',2500,24,30,'Plus LINK & ADA','Popular with active investors',true],
        ['Platinum Staking',5000,32,45,'Plus DOT & XRP','Serious capital growth'],
        ['Diamond Staking',10000,42,60,'Plus LTC & AVAX','Maximised compounding'],
        ['VIP Elite Staking',25000,60,90,'Plus early access','Institutional-grade returns'],
    ];
@endphp

<div class="grid-3">
    @foreach($plans as $i=>$p)
    <div class="plan {{ ($p[6] ?? false) ? 'hot' : '' }}" data-idx="{{ $i }}">
        <div class="muted" style="font-size:.78rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase">{{ $p[0] }}</div>
        <div class="roi num" style="color:var(--acc)">{{ $p[2] }}%</div>
        <div class="muted" style="font-size:.82rem">Total return in {{ $p[3] }} days</div>
        <div style="margin:14px 0;padding:10px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
            <div class="muted" style="font-size:.78rem">Stake</div>
            <div class="num" style="font-weight:800">${{ number_format($p[1]) }} – ${{ number_format($p[1]*20 < 500000 ? $p[1]*20 : 500000) }}</div>
        </div>
        <ul><li>{{ $p[4] }}</li><li>{{ $p[5] }}</li><li>Rewards paid daily</li></ul>
        <button class="btn btn-block btn-sm" style="margin-top:18px" onclick="pickPlan({{ $i }})">Select Plan</button>
    </div>
    @endforeach
</div>

<!-- Investment form -->
<div class="pa mt" id="investPanel" style="padding:24px;display:none">
    <div class="sec-h"><div><h2 id="planTitle">Start Staking</h2><p>Confirm your stake below</p></div></div>
    <form id="investForm">
        <input type="hidden" name="plan_name" id="iPlan">
        <input type="hidden" name="roi" id="iRoi">
        <input type="hidden" name="duration" id="iDur">
        <input type="hidden" name="duration_days" id="iDurDays">
        <input type="hidden" name="bonus" value="0">
        <div class="grid-2" style="grid-template-columns:1fr 1fr">
            <div>
                <label class="lbl">Stake amount (USD)</label>
                <input class="inp num" id="iAmount" type="number" min="0" step="0.01" required placeholder="e.g. 2,500">
            </div>
            <div>
                <label class="lbl">Est. reward at maturity</label>
                <div class="inp num" id="iReturn" style="display:flex;align-items:center;font-weight:700;color:var(--acc)">—</div>
            </div>
        </div>
        <button type="submit" class="btn btn-gold mt">Confirm Stake</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const plans={!! json_encode($plans) !!};
    function pickPlan(i){
        const p=plans[i];
        document.getElementById('investPanel').style.display='block';
        document.getElementById('planTitle').textContent=p[0];
        document.getElementById('iPlan').value=p[0];
        document.getElementById('iRoi').value=p[2];
        document.getElementById('iDur').value=p[3]+' days';
        document.getElementById('iDurDays').value=p[3];
        document.getElementById('iAmount').min=p[1];
        document.getElementById('iAmount').placeholder='Min $'+p[1].toLocaleString();
        calc();
        document.getElementById('investPanel').scrollIntoView({behavior:'smooth'});
    }
    function calc(){
        const p=plans.find((x,i)=>x[0]===document.getElementById('iPlan').value);
        const amt=parseFloat(document.getElementById('iAmount').value)||0;
        if(p&&amt>0){
            const exp=amt+(amt*p[2]/100)+0;
            document.getElementById('iReturn').innerHTML='$'+exp.toLocaleString('en-US',{maximumFractionDigits:2});
        } else document.getElementById('iReturn').textContent='—';
    }
    document.getElementById('iAmount').addEventListener('input',calc);
    document.getElementById('investForm').addEventListener('submit',e=>{
        e.preventDefault();
        const f=document.getElementById('investForm'),btn=f.querySelector('button[type=submit]');
        pvAjax(f,btn);
    });
</script>
@endsection