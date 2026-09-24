{{--
    PrimeVest theme bootstrap — MUST run before any CSS paints.
    Sets documentElement[data-theme] from localStorage['pv-theme'],
    falling back to the OS prefers-color-scheme. Binds window.pvTheme().
    Include early in <head> (before the layout's own <style>).
--}}
<script>
    (function(){
        var KEY='pv-theme';
        function prefer(){try{return (window.matchMedia&&matchMedia('(prefers-color-scheme: light)').matches)?'light':'dark'}catch(e){return 'dark'}}
        function apply(t){ if(t!=='light'&&t!=='dark'){t=prefer()} try{document.documentElement.setAttribute('data-theme',t)}catch(e){} }
        apply(function(){try{return localStorage.getItem(KEY)}catch(e){return null}}());
        window.pvTheme=function(){
            var h=document.documentElement;
            var cur=h.getAttribute('data-theme');
            var next=(cur==='light')?'dark':'light';
            h.setAttribute('data-theme',next);
            try{localStorage.setItem(KEY,next)}catch(e){}
        };
    })();
</script>
