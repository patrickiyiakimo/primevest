@extends('layouts.admin')

@section('page-title', 'Stock Price Management')
@section('breadcrumb', 'Set the live prices used on the trading desk')

@section('admin-content')
<div class="pa" style="padding:20px">
    <div class="sec-h">
        <div><h2>Stock Prices</h2><p>Prices are cached live and used in the Trading Desk</p></div>
        <button class="btn btn-ghost" id="btnSaveAll">Save All Prices</button>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Symbol</th><th>Company</th><th>Current Price</th><th></th></tr></thead>
        <tbody>
            @foreach($stocks as $symbol => $name)
            <tr data-sym="{{ strtolower($symbol) }}">
                <td class="num" style="font-weight:800">{{ $symbol }}</td>
                <td>{{ $name }}</td>
                <td style="max-width:260px">
                    <input type="number" step="0.01" min="0.01" value="{{ $currentPrices[$symbol] }}"
                           class="inp num" data-symbol="{{ $symbol }}" style="padding:8px 12px">
                </td>
                <td><button class="btn btn-sm btn-save">Update</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function flash(msg){alert(msg)}
    document.querySelectorAll('.btn-save').forEach(b=>{
        b.addEventListener('click',()=>{
            const row=b.closest('tr');
            const inp=row.querySelector('input[type=number]');
            const symbol=inp.dataset.symbol, price=inp.value;
            if(!price||price<=0)return flash('Enter a valid price');
            b.disabled=true; const o=b.textContent; b.textContent='Saving…';
            const fd=new FormData(); fd.append('symbol',symbol); fd.append('price',price);
            fetch('{{ route('admin.stock.prices.update') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'}})
            .then(r=>r.json()).then(d=>{b.disabled=false;b.textContent=o;flash(d.message)})
            .catch(()=>{b.disabled=false;b.textContent=o;flash('Failed to save')});
        });
    });
    document.getElementById('btnSaveAll').addEventListener('click',()=>{
        const inp=document.getElementById('btnSaveAll'),o=inp.textContent; inp.disabled=true; inp.textContent='Saving all…';
        const prices={};
        document.querySelectorAll('input[data-symbol]').forEach(i=>{prices[i.dataset.symbol]=parseFloat(i.value)||0});
        const fd=new FormData();
        Object.entries(prices).forEach(([sym,p])=>{fd.append('prices['+sym+']', p)});
        fetch('{{ route('admin.stock.prices.update-all') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'}})
        .then(r=>r.json()).then(d=>{inp.disabled=false;inp.textContent=o;flash(d.message)})
        .catch(()=>{inp.disabled=false;inp.textContent=o;flash('Failed to save all')});
    });
</script>
@endpush