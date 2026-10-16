@extends('layouts.admin')

@section('page-title', 'Wallet Addresses')
@section('breadcrumb', 'Manage the deposit wallets shown to users')

@section('admin-content')
<div class="grid-2">
    <div class="pa" style="padding:20px">
        <div class="sec-h">
            <div>
                <h2 id="formTitle">Add Wallet Address</h2>
                <p id="formHint">Wallets appear automatically on the user deposit page.</p>
            </div>
        </div>

        <form id="walletForm" method="POST" action="{{ route('admin.wallet-addresses.store') }}">
            @csrf
            <div class="grid-2" style="gap:14px">
                <div>
                    <label class="lbl">Coin code</label>
                    <input class="inp" name="coin" id="wCoin" placeholder="e.g. BTC" required>
                </div>
                <div>
                    <label class="lbl">Label</label>
                    <input class="inp" name="label" id="wLabel" placeholder="e.g. Bitcoin (BTC)" required>
                </div>
                <div>
                    <label class="lbl">Network</label>
                    <input class="inp" name="network" id="wNetwork" placeholder="e.g. ERC-20">
                </div>
                <div>
                    <label class="lbl">Logo path / URL</label>
                    <input class="inp" name="logo" id="wLogo" placeholder="images/btc.png or https://…">
                </div>
                <div>
                    <label class="lbl">Accent color</label>
                    <input class="inp" name="color" id="wColor" placeholder="#f7931a">
                </div>
                <div>
                    <label class="lbl">Sort order</label>
                    <input class="inp num" type="number" min="0" name="sort_order" id="wSort" value="0">
                </div>
            </div>

            <label class="lbl" style="margin-top:14px">Wallet address</label>
            <input class="inp" name="address" id="wAddress" placeholder="Destination address…" required>

            <label class="chk" style="margin-top:14px">
                <input type="checkbox" name="is_active" id="wActive" value="1" checked>
                Active (visible on the deposit page)
            </label>

            <div style="display:flex;gap:10px;margin-top:18px">
                <button type="submit" class="btn" id="walletSubmit">Add Wallet</button>
                <button type="button" class="btn btn-ghost" id="walletCancel" style="display:none" onclick="resetWalletForm()">Cancel</button>
            </div>
        </form>
    </div>

    <div class="pa pv-shade" style="padding:20px">
        <div class="sec-h"><div><h2 style="font-size:1.05rem">How this works</h2></div></div>
        <ul class="muted" style="font-size:.86rem;line-height:1.9;padding-left:18px;margin:0">
            <li>Only <b>active</b> wallets are shown on the user deposit page.</li>
            <li>The <b>coin code</b> (e.g. <span class="num">BTC</span>) must be unique — it links the address to the payment method.</li>
            <li>Instantly reflected — no deploy needed after saving.</li>
            <li>Leave <b>logo</b> blank to hide the coin icon.</li>
        </ul>
    </div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Configured Wallets</h2><p>{{ $wallets->count() }} wallet address(es)</p></div></div>
    <div style="overflow-x:auto">
        <table class="tbl">
            <thead>
                <tr>
                    <th>Coin</th><th>Label</th><th>Network</th><th>Address</th><th>Logo</th><th>Status</th><th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($wallets as $w)
                <tr>
                    <td><span class="pill pill-b">{{ $w->coin }}</span></td>
                    <td style="font-weight:600">{{ $w->label }}</td>
                    <td class="muted">{{ $w->network ?: '—' }}</td>
                    <td class="num muted" style="font-size:.8rem;max-width:280px;overflow:hidden;text-overflow:ellipsis">{{ $w->address }}</td>
                    <td>
                        @if($w->logo)
                            <img src="{{ \App\Models\WalletAddress::logoUrl($w->logo) }}" alt="" style="width:26px;height:26px;object-fit:contain">
                        @else
                            <span class="muted">—</span>
                        @endif
                    </td>
                    <td>
                        @if($w->is_active)
                            <span class="pill pill-g">Active</span>
                        @else
                            <span class="pill pill-r">Hidden</span>
                        @endif
                    </td>
                    <td style="text-align:right;white-space:nowrap">
                        <button type="button" class="btn btn-ghost btn-sm"
                            data-id="{{ $w->id }}"
                            data-coin="{{ $w->coin }}"
                            data-label="{{ $w->label }}"
                            data-network="{{ $w->network }}"
                            data-address="{{ $w->address }}"
                            data-logo="{{ $w->logo }}"
                            data-color="{{ $w->color }}"
                            data-sort="{{ $w->sort_order }}"
                            data-active="{{ $w->is_active ? 1 : 0 }}"
                            data-update-url="{{ route('admin.wallet-addresses.update', $w) }}"
                            onclick="editWallet(this)">Edit</button>
                        <form id="delWallet{{ $w->id }}" action="{{ route('admin.wallet-addresses.destroy', $w) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="button" class="btn btn-red btn-sm" onclick="pvConfirm('delWallet{{ $w->id }}','Remove this wallet address?')">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;padding:30px" class="muted">No wallets configured yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const STORE_URL = @json(route('admin.wallet-addresses.store'));

    function editWallet(btn) {
        const d = btn.dataset;
        document.getElementById('wCoin').value = d.coin || '';
        document.getElementById('wLabel').value = d.label || '';
        document.getElementById('wNetwork').value = d.network || '';
        document.getElementById('wLogo').value = d.logo || '';
        document.getElementById('wColor').value = d.color || '';
        document.getElementById('wSort').value = d.sort || 0;
        document.getElementById('wAddress').value = d.address || '';
        document.getElementById('wActive').checked = d.active === '1';

        document.getElementById('walletForm').action = d.updateUrl;
        document.getElementById('formTitle').textContent = 'Edit Wallet Address';
        document.getElementById('formHint').textContent = 'Updating ' + (d.label || d.coin) + '.';
        document.getElementById('walletSubmit').textContent = 'Save Changes';
        document.getElementById('walletCancel').style.display = 'inline-flex';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function resetWalletForm() {
        const form = document.getElementById('walletForm');
        form.reset();
        form.action = STORE_URL;
        document.getElementById('formTitle').textContent = 'Add Wallet Address';
        document.getElementById('formHint').textContent = 'Wallets appear automatically on the user deposit page.';
        document.getElementById('walletSubmit').textContent = 'Add Wallet';
        document.getElementById('walletCancel').style.display = 'none';
    }
</script>
@endpush
