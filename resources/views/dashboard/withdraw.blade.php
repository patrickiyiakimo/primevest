@extends('layouts.dashboard')

@section('page-title', 'Withdraw Funds')
@section('breadcrumb', 'Move your earnings to your own wallet')

@section('dashboard-content')
<div class="grid-2">
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Request Withdrawal</h2><p>Funds are sent after a quick security review</p></div></div>

        <form id="withdrawForm" action="{{ route('withdraw.request') }}" method="POST" data-reload="1">
            @csrf
            <label class="lbl">Withdrawal method</label>
            <select class="inp sel" name="method" style="margin-bottom:16px">
                <option value="Bitcoin">Bitcoin (BTC)</option>
                <option value="Ethereum" selected>Ethereum (ETH)</option>
                <option value="USDT">Tether (USDT – TRC20)</option>
                <option value="Solana">Solana (SOL)</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>

            <label class="lbl">Wallet address / account</label>
            <input class="inp num" name="wallet_address" required placeholder="e.g. 0x71C7…8976F" style="margin-bottom:16px">

            <label class="lbl">Network</label>
            <select class="inp sel" name="network" style="margin-bottom:16px">
                <option>Bitcoin</option>
                <option selected>ERC-20</option>
                <option>TRC-20</option>
                <option>Solana</option>
                <option>SWIFT / SEPA</option>
            </select>

            <label class="lbl">Amount (USD) <span class="muted">· min $1,000</span></label>
            <input class="inp num" name="amount" type="number" min="1000" step="0.01" required placeholder="e.g. 2,000.00">

            <button type="submit" class="btn btn-block mt">Request Withdrawal</button>
        </form>
        <div class="muted" style="font-size:.76rem;margin-top:12px;text-align:center">
            ⏱ Crypto withdrawals typically process within 15 minutes of approval.
        </div>
    </div>

    <div>
        <div class="pa" style="padding:22px;margin-bottom:18px">
            <div class="sec-h"><div><h2>Withdrawal limits</h2></div></div>
            <div style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--line)">
                <span class="muted">Minimum withdrawal</span><b class="num">$1,000</b>
            </div>
            <div style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--line)">
                <span class="muted">Maximum per request</span><b class="num">$500,000</b>
            </div>
            <div style="display:flex;justify-content:space-between;padding:12px 0">
                <span class="muted">Expected processing</span><b class="num ok">~15 min</b>
            </div>
        </div>
        <div class="pa" style="padding:22px;background:linear-gradient(140deg,#0d1d2e,#0c1322)">
            <div style="font-weight:800;margin-bottom:6px">🛡 Security protection</div>
            <p class="muted" style="margin:0;font-size:.86rem;line-height:1.7">
                All withdrawals are screened against anti-fraud rules. First-time withdrawals to a new address may require a short verification hold. Add wallet whitelisting from your profile to speed things up.
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('withdrawForm').addEventListener('submit',e=>{
        e.preventDefault();
        const f=e.target,btn=f.querySelector('button[type=submit]');
        pvAjax(f,btn);
    });
</script>
@endsection