{{-- Shared site footer.
     Included by layouts/landing.blade.php (marketing pages) and by
     layouts/app.blade.php (app pages such as /real-estate) so every page
     renders an identical footer. Styling lives in resources/css/footer.css,
     which both host stylesheets import. --}}
<footer class="wf-footer">
    <div class="pv-footer-container">
        <div class="wf-footer-grid">
            <div class="wf-footer-brand">
                <a href="{{ url('/') }}" class="pv-footer-logo" aria-label="PrimeVest home">
                    <img src="{{ asset('images/logoipsum-409.png') }}" width="30" height="24" alt="PrimeVest" loading="lazy">
                    <b>PrimeVest</b>
                </a>
                <p>A trusted digital asset investment platform. Buy, trade, stake and copy elite crypto traders.</p>
                <div class="wf-footer-social">
                    <a href="#" aria-label="PrimeVest on X"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2H21.5l-7.5 8.57L22.5 22h-6.9l-4.9-6.4L5.1 22H1.84l7.86-8.98L1.5 2h7.06l4.43 5.84L18.244 2zm-1.19 18h1.83L7.02 3.9H5.06L17.05 20z"/></svg></a>
                    <a href="#" aria-label="PrimeVest on Telegram"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.94 4.3 19.2 19.1c-.2 1.06-.86 1.32-1.74.82l-4.8-3.54-2.32 2.23c-.26.26-.47.47-.96.47l.34-4.86 8.84-7.98c.38-.34-.09-.53-.6-.19L7.06 13.3 2.36 11.9c-1.02-.32-1.04-1.02.21-1.51L20.5 3.6c.85-.31 1.6.2 1.44.7z"/></svg></a>
                    <a href="#" aria-label="PrimeVest on Discord"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.3 5.3A16.9 16.9 0 0015.4 4l-.3.5c1.3.3 2.4.8 3.4 1.4a13.9 13.9 0 00-11-.1C8.4 5.3 9.5 4.9 10.8 4.5L10.5 4a16.9 16.9 0 00-3.8 1.3C4.2 9.3 3.5 13.1 3.9 16.9a16.9 16.9 0 005.1 2.6l1-1.7c-.6-.2-1.1-.5-1.6-.8l.4-.3a12.2 12.2 0 0010.4 0l.4.3c-.5.3-1 .6-1.6.8l1 1.7a16.9 16.9 0 005.1-2.6c.5-4.4-.6-8.1-2.8-11.6zM9.7 14.8c-1 0-1.8-.9-1.8-2s.8-2 1.8-2 1.8.9 1.8 2-.8 2-1.8 2zm6.6 0c-1 0-1.8-.9-1.8-2s.8-2 1.8-2 1.8.9 1.8 2-.8 2-1.8 2z"/></svg></a>
                </div>
            </div>

            <div>
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('company') }}">About PrimeVest</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('education') }}">Learn Crypto</a></li>
                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                </ul>
            </div>

            <div>
                <h4>Markets</h4>
                <ul>
                    <li><a href="{{ route('forex.majors') }}">Bitcoin &amp; Altcoins</a></li>
                    <li><a href="{{ route('copy-trading') }}">Copy Trading</a></li>
                    <li><a href="{{ route('shares.us') }}">Crypto Trading Desk</a></li>
                    <li><a href="{{ route('buy-crypto') }}">Buy Crypto</a></li>
                </ul>
            </div>

            <div>
                <h4>Stay updated</h4>
                <p class="wf-footer-note">Market insights delivered to your inbox weekly.</p>
                <form class="pv-footer-form wf-footer-form" data-newsletter>
                    <input type="email" name="email" placeholder="Email address" aria-label="Email address" required>
                    <button type="submit">Join</button>
                </form>
            </div>
        </div>

        <div class="wf-footer-bottom">
            <span>&copy; {{ date('Y') }} PrimeVest. All rights reserved.</span>
            <nav aria-label="Footer">
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('education') }}">Academy</a>
                <a href="{{ route('company') }}">Company</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('privacy.policy') }}">Privacy</a>
            </nav>
        </div>

        <p class="wf-footer-legal">
            <b>Risk Disclosure:</b> Trading and investing in digital assets involves substantial risk and may not be suitable for all investors. The value of crypto assets is highly volatile and you may lose all invested capital. Past performance is not a reliable indicator of future results. Nothing on this website constitutes financial or investment advice.
        </p>
    </div>
</footer>