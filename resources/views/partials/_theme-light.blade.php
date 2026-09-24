{{--
    PrimeVest LIGHT palette + component overrides.
    These rules sit at `:root[data-theme="light"]` so they only win while the
    head bootstrap has set data-theme="light" on <html>. Component declarations
    flip hardcoded dark rgba(255,255,255,.0X) surfaces (which never use vars)
    to correspondingly subtle dark-on-light tints. Include INSIDE the layout's
    own <style> block, immediately AFTER the layout's `:root{...}` rule.
--}}
:root[data-theme="light"]{
    --bg:#f2f6fc; --bg2:#eaf0f8; --panel:#ffffff; --panel2:#f6f9ff;
    --line:rgba(10,22,46,.12); --text:#0b1424; --muted:#5c6b85;
    --acc:#0c9d6e; --acc2:#0a8a60; --gold:#a8730a; --red:#dc2626;
}
[data-theme="light"] body{background:var(--bg);color:var(--text)}
[data-theme="light"] a[data-band]{color:var(--muted)}
[data-theme="light"] ::selection{background:rgba(12,157,110,.25);color:#04120c}
