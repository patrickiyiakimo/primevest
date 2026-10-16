{{--
    Decorative confetti burst (canvas, no dependencies).

    Optional:
      $onceKey (string|null) — when set, a localStorage flag ensures the
      celebration fires only once per browser for that key.
--}}
@php $onceKey = $onceKey ?? null; @endphp
<style>#pvConfetti{position:fixed;inset:0;z-index:9998;pointer-events:none}</style>
<canvas id="pvConfetti" aria-hidden="true"></canvas>
<script>
(function(){
    var canvas = document.getElementById('pvConfetti');
    if(!canvas || !canvas.getContext) return;

    var KEY = @json($onceKey);
    if(KEY){
        try{
            if(localStorage.getItem(KEY) === '1'){ canvas.remove(); return; }
            // Flag before animating so a fast reload cannot double-fire.
            localStorage.setItem(KEY,'1');
        }catch(e){}
    }

    if(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches){
        canvas.remove();
        return;
    }

    var COLORS = ['#2563eb','#60a5fa','#3b82f6','#f59e0b','#22c55e','#ffffff'];
    var ctx = canvas.getContext('2d');
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var parts = [];

    function size(){
        canvas.width  = Math.floor(window.innerWidth  * dpr);
        canvas.height = Math.floor(window.innerHeight * dpr);
        canvas.style.width  = window.innerWidth  + 'px';
        canvas.style.height = window.innerHeight + 'px';
        ctx.setTransform(dpr,0,0,dpr,0,0);
    }
    size();
    window.addEventListener('resize', size);

    function burst(x, y, n, spread, power){
        for(var i=0;i<n;i++){
            var a = -Math.PI/2 + (Math.random()-0.5)*spread;
            var sp = power * (0.55 + Math.random()*0.75);
            parts.push({
                x:x, y:y,
                vx: Math.cos(a)*sp,
                vy: Math.sin(a)*sp,
                w: 5 + Math.random()*6,
                h: 8 + Math.random()*7,
                rot: Math.random()*6.283,
                vr: (Math.random()-0.5)*0.32,
                c: COLORS[(Math.random()*COLORS.length)|0],
                age: 0,
                ttl: 105 + Math.random()*70
            });
        }
    }

    var W = window.innerWidth, H = window.innerHeight;
    burst(W*0.11, H*0.94, 70, 1.05, 15);
    burst(W*0.89, H*0.94, 70, 1.05, 15);
    burst(W*0.50, H*0.44, 55, 2.40, 12);

    var t0 = performance.now(), MAX = 3600;

    function frame(now){
        W = window.innerWidth; H = window.innerHeight;
        ctx.clearRect(0,0,W,H);
        for(var i=parts.length-1;i>=0;i--){
            var p = parts[i];
            p.age++;
            p.vy += 0.26;
            p.vx *= 0.995;
            p.x  += p.vx;
            p.y  += p.vy;
            p.rot += p.vr;
            var k = p.age / p.ttl;
            if(p.y > H + 70 || k >= 1){ parts.splice(i,1); continue; }
            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rot);
            ctx.globalAlpha = k > 0.7 ? (1 - (k - 0.7) / 0.3) : 1;
            ctx.fillStyle = p.c;
            // Squashing the width fakes a ribbon spinning in 3D.
            var sx = Math.abs(Math.cos(p.rot * 1.6));
            if(sx < 0.06) sx = 0.06;
            ctx.fillRect(-p.w*sx/2, -p.h/2, p.w*sx, p.h);
            ctx.restore();
        }
        if(parts.length && now - t0 < MAX){
            requestAnimationFrame(frame);
        }else{
            canvas.remove();
            window.removeEventListener('resize', size);
        }
    }
    requestAnimationFrame(frame);
})();
</script>
