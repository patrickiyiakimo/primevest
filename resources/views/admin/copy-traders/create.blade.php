@extends('layouts.admin')

@section('page-title', 'New Copy Trader')
@section('breadcrumb', 'Create a trader profile')

@section('admin-content')
<div class="grid-2" style="grid-template-columns:1.3fr 1fr">
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Trader Details</h2></div></div>
        <form method="POST" action="{{ route('admin.copy-traders.store') }}">
            @csrf
            <div class="grid-2" style="grid-template-columns:1fr 1fr">
                <div>
                    <label class="lbl">Slug / handle</label>
                    <input class="inp" name="name" required placeholder="crypto-matrix" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">Display name</label>
                    <input class="inp" name="display_name" required placeholder="CryptoMatrix" style="margin-bottom:14px">
                </div>
            </div>
            <div class="grid-2" style="grid-template-columns:1fr 1fr">
                <div>
                    <label class="lbl">Avatar initials</label>
                    <input class="inp" name="avatar_initials" placeholder="CM" maxlength="4" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">Avatar color (hex)</label>
                    <input class="inp" name="avatar_color" placeholder="#7c3aed" style="margin-bottom:14px">
                </div>
            </div>
            <label class="lbl">Bio</label>
            <textarea class="inp" name="bio" rows="3" placeholder="A short profile shown to copiers…" style="margin-bottom:14px"></textarea>
            <div class="grid-4" style="grid-template-columns:1fr 1fr 1fr 1fr;gap:12px">
                <div>
                    <label class="lbl">Win rate %</label>
                    <input class="inp num" name="win_rate" type="number" step="0.1" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">Total ROI %</label>
                    <input class="inp num" name="total_roi" type="number" step="0.1" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">ROI period</label>
                    <input class="inp" name="roi_period" placeholder="3-year ROI" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">Copiers</label>
                    <input class="inp num" name="copiers" type="number" style="margin-bottom:14px">
                </div>
            </div>
            <div class="grid-4" style="grid-template-columns:1fr 1fr 1fr 1fr;gap:12px">
                <div>
                    <label class="lbl">Risk score</label>
                    <input class="inp num" name="risk_score" type="number" step="0.1" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">YTD return %</label>
                    <input class="inp num" name="ytd_return" type="number" step="0.1" style="margin-bottom:14px">
                </div>
                <div>
                    <label class="lbl">Status</label>
                    <select class="inp sel" name="status" style="margin-bottom:14px">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div style="display:flex;align-items:center;margin-bottom:14px">
                    <label style="display:flex;align-items:center;gap:8px;font-size:.85rem;color:var(--muted);cursor:pointer">
                        <input type="checkbox" name="is_featured" value="1"> 🔥 Featured
                    </label>
                </div>
            </div>
            <button class="btn btn-block">Create Copy Trader</button>
        </form>
    </div>
    <div>
        <div class="pa" style="padding:22px;margin-bottom:18px">
            <h2 style="margin:0 0 10px;font-size:1.1rem">Live preview</h2>
            <div class="side-av" style="width:64px;height:64px;border-radius:50%;display:grid;place-items:center;font-weight:800;font-size:1.4rem;background:linear-gradient(135deg,#fbd56d,var(--gold));color:#241a00;margin-bottom:12px">CM</div>
            <div style="font-weight:800;font-size:1.1rem">CryptoMatrix <span class="pill pill-g">Verified</span></div>
            <p class="muted" style="font-size:.85rem;line-height:1.6">How this trader appears to users browsing copy trading. Featured traders are ranked first.</p>
        </div>
        <div class="pa pv-shade" style="padding:22px">
            <h2 style="margin:0 0 10px;font-size:1.05rem">💡 Tips</h2>
            <ul style="margin:0;padding-left:18px;color:var(--muted);font-size:.85rem;line-height:1.8">
                <li>Use a real, verifiable track record.</li>
                <li>Keep win rate &amp; ROI honest — users trust transparency.</li>
                <li>Add monthly performance points to show history.</li>
                <li>Mark only your best traders as featured.</li>
            </ul>
        </div>
    </div>
</div>
@endsection