@extends('layouts.admin')

@section('page-title', 'Manage User')
@section('breadcrumb', $user->name)

@section('admin-content')
<div class="grid-2">
    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Account Overview</h2></div></div>
        <div style="display:flex;gap:14px;align-items:center;margin-bottom:20px">
            <div class="side-av" style="width:52px;height:52px;border-radius:14px;display:grid;place-items:center;font-weight:800;font-size:1.2rem;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d">{{ substr($user->name,0,1) }}</div>
            <div>
                <div style="font-weight:800;font-size:1.1rem">{{ $user->name }}</div>
                <div class="muted" style="font-size:.82rem">{{ $user->email }} · {{ $user->phone ?? 'no phone' }}</div>
            </div>
        </div>
        <div class="kpi" style="grid-template-columns:1fr 1fr;gap:12px">
            <div class="kpi-card" style="padding:18px"><div class="lbl">Balance</div><div class="val num" style="font-size:1.25rem">${{ number_format($user->balance, 2) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">Total Profits</div><div class="val num ok" style="font-size:1.25rem">${{ number_format($user->total_profits ?? 0, 2) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">KYC Status</div><div class="val" style="font-size:1.05rem">{{ ucwords(str_replace('_',' ',$user->kyc_status ?? 'not_submitted')) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">Joined</div><div class="val num" style="font-size:1.05rem">{{ $user->created_at->format('M d, Y') }}</div></div>
        </div>
        <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap">
            @if(($user->kyc_status ?? '') == 'pending')
            <a href="{{ route('admin.kyc.view', $user->id) }}" class="btn btn-sm">Review KYC</a>
            @endif
            <a href="{{ route('admin.users') }}" class="btn btn-ghost btn-sm">← All users</a>
        </div>
    </div>

    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Balance Adjustment</h2><p>Credit, debit, add profit or apply a loss</p></div></div>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf @method('PUT')
            <label class="lbl">Transaction type</label>
            <select class="inp sel" name="transaction_type" style="margin-bottom:14px">
                <option value="credit">Credit (+) — add to balance</option>
                <option value="debit">Debit (-) — deduct from balance</option>
                <option value="profit">Profit — add to total profits</option>
                <option value="loss">Loss (-) — deduct from total profits, then balance</option>
            </select>
            <label class="lbl">Amount (USD)</label>
            <input class="inp num" name="amount" type="number" min="0.01" step="0.01" required style="margin-bottom:14px">
            <label class="lbl">Description <span class="muted">(optional)</span></label>
            <input class="inp" name="description" placeholder="e.g. Manual credit for referral bonus" style="margin-bottom:18px">
            <button class="btn btn-block">Apply Adjustment</button>
        </form>
        <p class="muted mt" style="font-size:.8rem;margin-bottom:0">💡 The user is notified by email. Debits above the current balance are rejected automatically, and a loss larger than the user's total profits plus balance is rejected too.</p>
    </div>
</div>

<div class="pa mt" style="padding:22px">
    <div class="sec-h">
        <div>
            <h2>Loss History</h2>
            <p>Most recent 20 losses applied to this account. Reversing refunds the exact split that was deducted.</p>
        </div>
    </div>

    @if($losses->isEmpty())
        <p class="muted" style="margin:0">No losses have been applied to this account.</p>
    @else
        <div style="overflow-x:auto">
            <table class="tbl" style="width:100%">
                <thead>
                    <tr>
                        <th>Applied</th>
                        <th>Amount</th>
                        <th>Deducted from</th>
                        <th>Reason</th>
                        <th>By</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($losses as $loss)
                        <tr>
                            <td style="white-space:nowrap">{{ $loss->applied_at?->format('M j, Y g:i A') ?? '—' }}</td>
                            <td style="color:#ef4444;font-weight:700;white-space:nowrap">-${{ number_format($loss->amount, 2) }}</td>
                            <td class="muted" style="font-size:.8rem;white-space:nowrap">
                                ${{ number_format($loss->profit_deducted, 2) }} profits<br>
                                ${{ number_format($loss->balance_deducted, 2) }} balance
                            </td>
                            <td style="max-width:220px">{{ \Illuminate\Support\Str::limit($loss->reason ?? '—', 60) }}</td>
                            <td class="muted" style="white-space:nowrap">{{ $loss->admin?->name ?? '—' }}</td>
                            <td style="white-space:nowrap">
                                @if($loss->isReversed())
                                    <span style="display:inline-block;padding:3px 9px;border-radius:999px;font-size:.7rem;font-weight:700;background:rgba(255,255,255,.06);color:var(--muted)">Reversed</span>
                                    <div class="muted" style="font-size:.75rem;margin-top:4px">
                                        {{ $loss->reversed_at?->format('M j, Y') }} by {{ $loss->reversedBy?->name ?? 'admin' }}
                                    </div>
                                @else
                                    <span style="display:inline-block;padding:3px 9px;border-radius:999px;font-size:.7rem;font-weight:700;background:rgba(239,68,68,.16);color:#ff8b93">Applied</span>
                                @endif
                            </td>
                            <td>
                                @unless($loss->isReversed())
                                    <form method="POST" action="{{ route('admin.users.losses.reverse', $loss->id) }}" id="rev-loss-{{ $loss->id }}">
                                        @csrf
                                        <input type="hidden" name="reversal_reason" value="Reversed by admin">
                                        <button type="button" class="btn btn-sm btn-red"
                                                onclick="pvConfirm('rev-loss-{{ $loss->id }}', 'Reverse this ${{ number_format($loss->amount, 2) }} loss? ${{ number_format($loss->profit_deducted, 2) }} returns to total profits and ${{ number_format($loss->balance_deducted, 2) }} to balance.')">Reverse</button>
                                    </form>
                                @endunless
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection