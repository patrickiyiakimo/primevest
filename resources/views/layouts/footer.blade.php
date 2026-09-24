<footer style="border-top:1px solid var(--line);background:var(--bg2);padding:60px 0 0;margin-top:40px">
    <div class="pv-container">
        <div class="pv-grid pv-grid-4" style="gap:30px;padding-bottom:44px">
            <div>
                <a href="{{ url('/') }}" class="pv-logo" style="margin-bottom:14px">
                    <span class="pv-logo-badge">P</span>
                    <span>Prime<span class="pv-acc">Vest</span></span>
                </a>
                <p class="pv-foot" style="max-width:260px;line-height:1.7">A trusted digital asset investment platform. Buy, trade, stake and copy elite crypto traders.</p>
                <div style="display:flex;gap:10px;margin-top:16px">
                    <a href="#" aria-label="X" style="width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.05);border:1px solid var(--line);display:grid;place-items:center;font-size:.8rem">𝕏</a>
                    <a href="#" aria-label="Telegram" style="width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.05);border:1px solid var(--line);display:grid;place-items:center;font-size:.9rem">✈</a>
                    <a href="#" aria-label="Discord" style="width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.05);border:1px solid var(--line);display:grid;place-items:center;font-size:.9rem">◇</a>
                </div>
            </div>
            <div>
                <div style="font-weight:700;margin-bottom:14px" class="pv-acc">Company</div>
                <div style="display:flex;flex-direction:column;gap:10px" class="pv-foot">
                    <a href="{{ route('company') }}">About PrimeVest</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('education') }}">Learn Crypto</a>
                    <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                </div>
            </div>
            <div>
                <div style="font-weight:700;margin-bottom:14px" class="pv-acc">Markets</div>
                <div style="display:flex;flex-direction:column;gap:10px" class="pv-foot">
                    <a href="{{ route('forex.majors') }}">Bitcoin &amp; Altcoins</a>
                    <a href="{{ route('trading') }}#copy-trading">Copy Trading</a>
                    <a href="{{ route('stock-trading') }}">Crypto Trading Desk</a>
                    <a href="{{ route('buy-crypto') }}">Buy Crypto</a>
                </div>
            </div>
            <div>
                <div style="font-weight:700;margin-bottom:14px" class="pv-acc">Stay updated</div>
                <p class="pv-foot" style="margin-bottom:12px">Market insights delivered to your inbox weekly.</p>
                <form style="display:flex;gap:8px" onsubmit="event.preventDefault();alert('Subscribed!')">
                    <input class="pv-input" style="flex:1" type="email" placeholder="Email address" required>
                    <button class="pv-btn pv-btn-sm" type="submit">Join</button>
                </form>
            </div>
        </div>
        <div style="border-top:1px solid var(--line);padding:20px 0;display:flex;flex-wrap:wrap;gap:14px;justify-content:space-between" class="pv-foot">
            <span>&copy; 2023 PrimeVest. All rights reserved.</span>
            <span>BTC · ETH · SOL · USDT · ADA · DOT</span>
        </div>
        <div style="padding:0 0 26px">
            <p class="pv-foot" style="max-width:1000px;line-height:1.7;color:#6d7889">
                <strong style="color:#94a1b6">Risk Disclosure:</strong> Trading and investing in digital assets involves substantial risk and may not be suitable for all investors. The value of crypto assets is highly volatile and you may lose all invested capital. Past performance is not a reliable indicator of future results. Nothing on this website constitutes financial or investment advice.
            </p>
        </div>
    </div>
</footer>