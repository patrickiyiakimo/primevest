@extends('layouts.dashboard')

@section('page-title', 'Copy Traders')
@section('breadcrumb', 'Mirror proven strategies automatically')

@section('dashboard-content')
@php
    $trustBadges = [
        '⚡ Automated mirroring',
        '🛡 Audited track records',
        '✋ Portfolio stop-loss',
        '📊 Real-time sync',
    ];
@endphp

<style>
    .pv-modal{position:fixed;inset:0;z-index:999;display:none;align-items:center;justify-content:center;padding:16px;background:rgba(3,6,12,.72);backdrop-filter:blur(8px)}
    .pv-modal.open{display:flex}
    .ct-card{position:relative;padding:22px;border-radius:16px;border:1px solid var(--line);background:linear-gradient(180deg,var(--panel2),var(--panel))}
    .ct-stats{display:flex;justify-content:space-between;align-items:flex-end;margin:16px 0;padding:12px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);gap:10px}
    .ct-risk{width:46px;height:46px;border-radius:50%;display:grid;place-items:center;font-weight:800;font-size:.78rem;flex-shrink:0}
</style>

<div class="pa pv-shade" style="padding:26px">
    <div style="text-align:center;max-width:640px;margin:0 auto">
        <div style="font-weight:800;font-size:1.2rem;color:var(--text)">Mirror the moves of crypto's best traders</div>
        <div class="muted" style="font-size:.9rem;margin-top:8px">Instead of building a strategy from scratch, follow verified professionals. Your account automatically mirrors their trades — win when they win.</div>
    </div>
    <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:center;margin-top:22px">
        @foreach($trustBadges as $b)
        <span class="pill" style="background:rgba(255,255,255,.07);border:1px solid var(--line);padding:8px 14px;font-size:.8rem">{{ $b }}</span>
        @endforeach
    </div>
</div>

<!-- Traders grid -->
<div class="grid-3 mt">
    @forelse($traders as $t)
    <div class="ct-card pv-card">
        @if($t->is_featured)<span class="pill pill-y" style="position:absolute;top:16px;right:16px">🔥 Featured</span>@endif
        <div style="display:flex;align-items:center;gap:13px">
            <div style="width:48px;height:48px;border-radius:50%;background:{{ $t->avatar_color ?? '#7c3aed' }};display:grid;place-items:center;font-weight:800;color:#fff;font-size:1rem">{{ $t->avatar_initials ?? substr($t->display_name,0,2) }}</div>
            <div>
                <div style="font-weight:800;font-size:1rem">{{ $t->display_name }}</div>
                <div class="muted" style="font-size:.75rem">{{ number_format($t->copiers) }} copiers</div>
            </div>
        </div>
        @if($t->bio)
        <p class="muted" style="font-size:.82rem;line-height:1.6;margin:12px 0 0">{{ $t->bio }}</p>
        @endif
        <div class="ct-stats">
            <div><div class="num ok" style="font-weight:800;font-size:1.05rem">+{{ $t->total_roi }}%</div><div class="muted" style="font-size:.7rem">{{ $t->roi_period ?? 'Total ROI' }}</div></div>
            <div><div class="num" style="font-weight:800;font-size:1.05rem">{{ $t->win_rate }}%</div><div class="muted" style="font-size:.7rem">Win rate</div></div>
            <div><div class="num" style="font-weight:800;font-size:1.05rem;color:var(--gold)">+{{ $t->ytd_return }}%</div><div class="muted" style="font-size:.7rem">YTD</div></div>
        </div>
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px">
            <span class="ct-risk" style="background:{{ $t->risk_score > 25 ? 'rgba(239,68,68,.15)' : 'rgba(47,123,255,.13)' }};color:{{ $t->risk_score > 25 ? '#ff7c85' : 'var(--acc)' }}">{{ $t->risk_score }}</span>
            <div>
                <div style="font-size:.82rem;font-weight:700">Risk score</div>
                <div class="muted" style="font-size:.72rem">{{ $t->risk_score > 25 ? 'Higher risk profile' : 'Balanced risk profile' }}</div>
            </div>
            <span style="margin-left:auto" class="pill {{ $t->status == 'active' ? 'pill-g' : 'pill-r' }}">{{ $t->status == 'active' ? '● Active' : 'Inactive' }}</span>
        </div>
        <button class="btn btn-block btn-gold" onclick="openCopyModal({{ $t->id }}, {{ json_encode($t->display_name) }})">Start Copying</button>
    </div>
    @empty
    <div class="pa" style="padding:44px;grid-column:1/-1;text-align:center"><span class="muted">No copy traders available right now. Check back soon.</span></div>
    @endforelse
</div>

<!-- How copy works -->
<div class="grid-3 mt">
    <div class="pa" style="padding:22px"><div class="step-n" style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#57c8ff,#2f7bff);color:#04121f;display:grid;place-items:center;font-weight:800">1</div><h3 style="margin:12px 0 6px;font-size:1rem">Choose a trader</h3><p class="muted" style="font-size:.85rem;margin:0;line-height:1.6">Compare verified track records, win rates and risk scores. Transparent, audited stats only.</p></div>
    <div class="pa" style="padding:22px"><div class="step-n" style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#57c8ff,#2f7bff);color:#04121f;display:grid;place-items:center;font-weight:800">2</div><h3 style="margin:12px 0 6px;font-size:1rem">Set your allocation</h3><p class="muted" style="font-size:.85rem;margin:0;line-height:1.6">Decide how much of your balance to mirror — you keep full ownership of your funds.</p></div>
    <div class="pa" style="padding:22px"><div class="step-n" style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#57c8ff,#2f7bff);color:#04121f;display:grid;place-items:center;font-weight:800">3</div><h3 style="margin:12px 0 6px;font-size:1rem">Earn automatically</h3><p class="muted" style="font-size:.85rem;margin:0;line-height:1.6">Every trade they take is copied to your account in real time. Watch your portfolio grow.</p></div>
</div>

<!-- Start copying modal -->
<div id="copyModal" class="pv-modal" onclick="if(event.target===this)closeCopyModal()">
    <div style="width:min(430px,100%);background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:20px;padding:26px;box-shadow:0 40px 80px -40px rgba(0,0,0,.8)">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:18px">
            <div>
                <div style="font-weight:800;font-size:1.15rem">Start Copying</div>
                <div class="muted" style="font-size:.82rem;margin-top:3px">Mirror <b style="color:var(--text)" id="ctTraderName">this trader</b>'s strategy</div>
            </div>
            <button class="ct-x" style="background:none;border:none;color:var(--muted);font-size:1.4rem;line-height:1;cursor:pointer;padding:0 2px" onclick="closeCopyModal()" aria-label="Close">×</button>
        </div>
        <form method="POST" action="{{ route('copy-traders.request') }}">
            @csrf
            <input type="hidden" name="copy_trader_id" id="ctTraderId" value="">
            <label class="lbl" for="ctAmount">Copy amount (USD)</label>
            <input class="inp num" id="ctAmount" name="amount" type="number" min="1" step="0.01" placeholder="500" required>
            <p class="muted" style="font-size:.76rem;margin:10px 0 0">Your request is reviewed by our team and activated once approved.</p>
            <button class="btn btn-block" style="margin-top:18px">Submit Request</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openCopyModal(id,name){
        document.getElementById('ctTraderId').value=id;
        document.getElementById('ctTraderName').textContent=name;
        document.getElementById('copyModal').classList.add('open');
    }
    function closeCopyModal(){document.getElementById('copyModal').classList.remove('open')}
    document.addEventListener('keydown',(e)=>{if(e.key==='Escape')closeCopyModal()});
</script>
@endsection