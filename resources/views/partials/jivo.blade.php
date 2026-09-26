<script src="https://code.jivosite.com/widget/tAEs2KagqM" async></script>
<script>
    (function(){
        // Jivo only defines its API once its own script has loaded, so a click
        // that lands first would otherwise be dropped. Poll briefly, then give up.
        function api(){
            var a=window.jivo_api||window.Jivo_API;
            return (a&&typeof a.open==='function')?a:null;
        }
        window.pvOpenChat=function(params){
            var a=api();
            if(a){try{return a.open(params||{})}catch(e){}}
            var tries=0;
            var t=setInterval(function(){
                var ready=api();
                if(ready){clearInterval(t);try{ready.open(params||{})}catch(e){}}
                else if(++tries>50){clearInterval(t)}
            },120);
        };
    })();
</script>
