@extends('layouts.admin')

@section('page-title', 'Edit Copy Trader')
@section('breadcrumb', $trader->display_name)

@section('admin-content')
<div class="pa" style="padding:24px;max-width:820px">
    <div class="sec-h">
        <div><h2>Edit {{ $trader->display_name }}</h2></div>
        <a href="{{ route('admin.copy-traders.index') }}" class="btn btn-ghost btn-sm">← All traders</a>
    </div>
    <form method="POST" action="{{ route('admin.copy-traders.update', $trader->id) }}">
        @csrf @method('PUT')
        <div class="grid-2" style="grid-template-columns:1fr 1fr">
            <div>
                <label class="lbl">Slug / handle</label>
                <input class="inp" name="name" required value="{{ old('name', $trader->name) }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">Display name</label>
                <input class="inp" name="display_name" required value="{{ old('display_name', $trader->display_name) }}" style="margin-bottom:14px">
            </div>
        </div>
        <div class="grid-2" style="grid-template-columns:1fr 1fr">
            <div>
                <label class="lbl">Avatar initials</label>
                <input class="inp" name="avatar_initials" value="{{ old('avatar_initials', $trader->avatar_initials) }}" maxlength="4" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">Avatar color (hex)</label>
                <input class="inp" name="avatar_color" value="{{ old('avatar_color', $trader->avatar_color) }}" style="margin-bottom:14px">
            </div>
        </div>
        <label class="lbl">Bio</label>
        <textarea class="inp" name="bio" rows="3" placeholder="A short profile…" style="margin-bottom:14px">{{ old('bio', $trader->bio) }}</textarea>
        <div class="grid-4" style="grid-template-columns:1fr 1fr 1fr 1fr;gap:12px">
            <div>
                <label class="lbl">Win rate %</label>
                <input class="inp num" name="win_rate" type="number" step="0.1" value="{{ $trader->win_rate }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">Total ROI %</label>
                <input class="inp num" name="total_roi" type="number" step="0.1" value="{{ $trader->total_roi }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">ROI period</label>
                <input class="inp" name="roi_period" value="{{ $trader->roi_period }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">Copiers</label>
                <input class="inp num" name="copiers" type="number" value="{{ $trader->copiers }}" style="margin-bottom:14px">
            </div>
        </div>
        <div class="grid-4" style="grid-template-columns:1fr 1fr 1fr 1fr;gap:12px">
            <div>
                <label class="lbl">Risk score</label>
                <input class="inp num" name="risk_score" type="number" step="0.1" value="{{ $trader->risk_score }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">YTD return %</label>
                <input class="inp num" name="ytd_return" type="number" step="0.1" value="{{ $trader->ytd_return }}" style="margin-bottom:14px">
            </div>
            <div>
                <label class="lbl">Status</label>
                <select class="inp sel" name="status" style="margin-bottom:14px">
                    <option value="active" {{ $trader->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $trader->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div style="display:flex;align-items:center;margin-bottom:14px">
                <label style="display:flex;align-items:center;gap:8px;font-size:.85rem;color:var(--muted);cursor:pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ $trader->is_featured ? 'checked' : '' }}> 🔥 Featured
                </label>
            </div>
        </div>
        <button class="btn btn-block">Save Changes</button>
    </form>
</div>
@endsection