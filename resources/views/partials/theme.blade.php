{{--
    PrimeVest theme bootstrap + LIGHT palette + light-mode component overrides.

    This partial MUST be included in <head> of EVERY layout (app/guest/dashboard/admin),
    placed AFTER the layout's <meta name="csrf-token"> line but BEFORE (or at the very
    top of) the layout's own inline <style>. Because it is self-contained it is
    guaranteed to render in every layout regardless of @section/@stack conventions.

    What it does:
      1) FOUC-safe: sets <html data-theme> from localStorage (KEY 'pv-theme') before any
         CSS paints, defaulting to the OS prefers-color-scheme.
      2) Defines window.pvTheme() to flip + persist the theme.
      3) Provides the same :root[data-theme="light"] palette vars the layouts read, plus
         [data-theme="light"] overrides for every hardcoded white-rgba surface and the
         navy page/nav/sidebar/topbar backgrounds that would otherwise break contrast.
      4) Styles + wires the .pv-theme-btn toggle button (icons sun/moon, data-theme aware).
--}}
<script>
    (function(){
        var KEY='pv-theme';
        function prefer(){try{return (window.matchMedia&&matchMedia('(prefers-color-scheme: light)').matches)?'light':'dark'}catch(e){return 'dark'}}
        function apply(t){ if(t!=='light'&&t!=='dark'){t=prefer()} try{document.documentElement.setAttribute('data-theme',t)}catch(e){} }
        var s=null; try{s=localStorage.getItem(KEY)}catch(e){}
        apply(s);
        window.pvTheme=function(){
            var h=document.documentElement;
            var cur=h.getAttribute('data-theme');
            var next=(cur==='light')?'dark':'light';
            h.setAttribute('data-theme',next);
            try{localStorage.setItem(KEY,next)}catch(e){}
        };
    })();
</script>
<style>
    :root[data-theme="light"]{
        --bg:#f2f6fc; --bg2:#e9eef7; --panel:#ffffff; --panel2:#f5f9ff;
        --line:rgba(10,24,52,.12); --text:#0b1526; --muted:#5c6b86;
        --acc:#2f7bff; --acc2:#00b4ff; --gold:#b07f0b; --red:#dc2626;
    }

    /* Universal light surfaces (hardcoded white-rgba -> dark-on-light tint) */
    [data-theme="light"] body{background:var(--bg);color:var(--text)}

    /* Accent shade panels: dark navy gradient in dark mode, soft blue in light */
    .pv-shade{background:linear-gradient(140deg,#0d1d2e,#0c1322)!important}
    [data-theme="light"] .pv-shade{background:linear-gradient(140deg,#e3eeff,#f6f9ff)!important}
    [data-theme="light"] .pv-panel-soft,[data-theme="light"] .pv-stat,[data-theme="light"] .step-box,
    [data-theme="light"] .side-user,[data-theme="light"] .udrop-menu a:hover,
    [data-theme="light"] .notif,[data-theme="light"] .tsearch,[data-theme="light"] .udrop-btn{background:rgba(10,24,52,.04)}
    [data-theme="light"] .pv-btn-ghost,[data-theme="light"] .btn-ghost,
    [data-theme="light"] .pv-input,[data-theme="light"] .inp{background:rgba(10,24,52,.05);border-color:var(--line)}
    [data-theme="light"] .pv-btn-ghost:hover,[data-theme="light"] .btn-ghost:hover{background:rgba(10,24,52,.09)}
    [data-theme="light"] .pv-table th,[data-theme="light"] .tbl th{background:rgba(10,24,52,.03)}
    [data-theme="light"] .pv-table tr:hover td,[data-theme="light"] .tbl tr:hover td{background:rgba(10,24,52,.04)}
    [data-theme="light"] .side-item:hover{background:rgba(10,24,52,.06)}

    /* Navy page/nav/sidebar/topbar backgrounds -> light glass */
    [data-theme="light"] .pv-nav,[data-theme="light"] .topbar{background:rgba(255,255,255,.82);border-color:var(--line);backdrop-filter:blur(18px)}
    [data-theme="light"] .side,.some-side{background:#f4f8ff}.side-item.on{box-shadow:inset 2px 0 0 var(--acc)}
    [data-theme="light"] .pv-burger{color:var(--text)}
    [data-theme="light"] .pv-ticker{color:var(--muted)}

    /* Navbar / mobile menu surfaces */
    [data-theme="light"] .pv-nav-links a{color:var(--muted)}
    [data-theme="light"] .pv-nav-links a:hover{background:rgba(47,123,255,.10);color:var(--text)}
    [data-theme="light"] .pv-nav-links a.active{background:rgba(47,123,255,.13);color:var(--acc);box-shadow:inset 2.5px 0 0 var(--acc)}
    /* The dropdown panel is a dark navy in the base stylesheet, which left the
       light theme's slate text unreadable inside it. */
    [data-theme="light"] .pv-nav-links{background:rgba(255,255,255,.97);box-shadow:0 40px 80px -30px rgba(10,24,52,.32),inset 0 1px 0 rgba(255,255,255,.9)}
    [data-theme="light"] .pv-menu-ic{background:rgba(10,24,52,.04)}
    [data-theme="light"] .pv-nav-links a.active .pv-menu-ic{background:linear-gradient(135deg,rgba(87,200,255,.30),rgba(47,123,255,.16));border-color:rgba(47,123,255,.45)}
    [data-theme="light"] .pv-burger:hover{background:rgba(10,24,52,.06)}

    /* Toggle button */
    .pv-theme-btn{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;border-radius:12px;border:1px solid var(--line);background:rgba(255,255,255,.06);color:var(--muted);cursor:pointer;transition:.2s;flex-shrink:0}
    .pv-theme-btn:hover{color:var(--text);border-color:var(--acc)}
    .pv-ic-sun{display:none}
    [data-theme="light"] .pv-ic-sun{display:block}
    [data-theme="light"] .pv-ic-moon{display:none}
    [data-theme="light"] .pv-theme-btn{background:rgba(10,24,52,.05);color:var(--text)}

    /* Balance privacy eye (dashboard) */
    [data-theme="light"] .pv-eye{background:rgba(10,24,52,.05);color:var(--muted)}
    [data-theme="light"] .pv-eye:hover{background:rgba(10,24,52,.09);color:var(--text)}
    [data-theme="light"] .pv-balances-hidden .pv-eye{background:rgba(47,123,255,.12)}
</style>
