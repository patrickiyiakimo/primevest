@extends('layouts.admin')

@section('page-title', 'Copy Traders')
@section('breadcrumb', 'Manage the traders users can mirror')

@section('admin-content')
<div class="pa" style="padding:20px">
    <div class="sec-h">
        <div><h2>Copy Traders</h2><p>{{ $traders->count() }} profiles</p></div>
        <a href="{{ route('admin.copy-traders.create') }}" class="btn btn-sm">+ New Copy Trader</a>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Trader</th><th>Win rate</th><th>ROI</th><th>Copiers</th><th>Risk</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @forelse($traders as $t)
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:10px">
                        <div style="width:36px;height:36px;border-radius:50%;background:{{ $t->avatar_color }};display:grid;place-items:center;font-weight:800;color:#fff;font-size:.9rem">{{ $t->avatar_initials ?? substr($t->display_name,0,2) }}</div>
                        <div>
                            <b>{{ $t->display_name }}</b>
                            @if($t->is_featured)<span class="pill pill-y" style="margin-left:6px">🔥 Featured</span>@endif
                            <div class="muted" style="font-size:.75rem">{{ $t->name }}</div>
                        </div>
                    </div>
                </td>
                <td class="num" style="font-weight:700">{{ $t->win_rate }}%</td>
                <td class="num ok" style="font-weight:700">+{{ $t->total_roi }}%</td>
                <td class="num">{{ number_format($t->copiers) }}</td>
                <td class="num">{{ $t->risk_score }}</td>
                <td><span class="pill {{ $t->status == 'active' ? 'pill-g' : 'pill-r' }}">{{ ucfirst($t->status) }}</span></td>
                <td style="text-align:right;white-space:nowrap">
                    <a href="{{ route('admin.copy-traders.edit', $t->id) }}" class="btn btn-ghost btn-sm">Edit</a>
                    <form action="{{ route('admin.copy-traders.destroy', $t->id) }}" method="POST" id="del-{{ $t->id }}" style="display:inline">@csrf @method('DELETE')
                        <button class="btn btn-red btn-sm" onclick="event.preventDefault();pvConfirm('del-{{ $t->id }}','Delete {{ $t->display_name }}?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:44px" class="muted">No copy traders yet. <a href="{{ route('admin.copy-traders.create') }}" style="color:var(--acc);font-weight:700">Create the first one →</a></td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Monthly Performance Records</h2><p>Add performance points for each trader</p></div></div>
    <div class="grid-2">
        @forelse($traders as $t)
        <div class="pa" style="padding:16px">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
                <b>{{ $t->display_name }}</b>
                <span class="pill pill-b">{{ $t->performances->count() }} records</span>
            </div>
            <div style="overflow-x:auto">
            <table class="tbl">
                <thead><tr><th>Month</th><th>Return</th><th>Equity</th><th></th></tr></thead>
                <tbody>
                    @foreach($t->performances as $p)
                    <tr>
                        <td class="num">{{ $p->month }}</td>
                        <td class="num {{ $p->return_percent >= 0 ? 'ok' : 'bad' }}">{{ $p->return_percent >= 0 ? '+' : '' }}{{ $p->return_percent }}%</td>
                        <td class="num">${{ number_format($p->equity,2) }}</td>
                        <td>
                            <form action="{{ route('admin.copy-traders.performances.destroy', $p->id) }}" method="POST" id="pd-{{ $p->id }}">@csrf @method('DELETE')
                                <button class="btn btn-red btn-sm" onclick="event.preventDefault();pvConfirm('pd-{{ $p->id }}','Remove this record?')">✕</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <form action="{{ route('admin.copy-traders.performances.store', $t->id) }}" method="POST" style="display:flex;gap:8px;margin-top:12px;flex-wrap:wrap">
                @csrf
                <input class="inp" name="month" placeholder="YYYY-MM" style="flex:1;min-width:100px">
                <input class="inp num" name="return_percent" type="number" step="0.01" placeholder="Return %" style="width:110px">
                <input class="inp num" name="equity" type="number" step="0.01" placeholder="Equity $" style="width:120px">
                <button class="btn btn-sm">Add</button>
            </form>
        </div>
        @empty
        <p class="muted">Create a trader first to add performance records.</p>
        @endforelse
    </div>
</div>
@endsection