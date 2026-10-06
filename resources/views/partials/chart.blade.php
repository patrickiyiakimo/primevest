{{--
  Deterministic premium chart visual.

  @include('partials.chart', [
      'seed'    => 11,          // any int — same seed always renders identically
      'style'   => 'area',      // 'area' | 'candles'
      'symbol'  => 'BTC/USD',
      'name'    => 'Bitcoin',
      'price'   => '$68,412.90',
      'change'  => '+4.82%',
      'up'      => true,
      'accent'  => '#22d3a5',   // line / candle-up colour
      'tone'    => '#0a0f1e',   // panel base
      'wide'    => true,        // true = full-bleed card art, false = compact strip
  ]]
--}}
@php
    $w      = 718;
    $h      = 650;
    $seed   = (int)($seed ?? 7);
    $style  = $style ?? 'area';
    $up     = $up ?? true;
    $wide   = $wide ?? true;
    $accent = $accent ?? '#22d3a5';
    $tone   = $tone ?? '#0a0f1e';
    $uid    = 'c' . substr(md5($seed . $symbol . $style . $accent), 0, 8);

    /* deterministic LCG — identical output on every render */
    $rng = function () use (&$seed) {
        $seed = ($seed * 1103515245 + 12345) & 0x7FFFFFFF;
        return $seed / 0x7FFFFFFF;
    };

    /* ---- random walk with drift, then light smoothing ---- */
    $n      = 64;
    $drift  = $up ? 0.0075 : -0.0075;
    $raw    = [];
    $v      = 0.42;
    for ($i = 0; $i < $n; $i++) {
        $v += ($rng() - 0.5) * 0.075 + $drift;
        $v  = max(0.06, min(0.94, $v));
        $raw[] = $v;
    }
    $vals = [];
    for ($i = 0; $i < $n; $i++) {
        $a = $raw[max(0, $i - 1)];
        $b = $raw[$i];
        $c = $raw[min($n - 1, $i + 1)];
        $vals[] = ($a + 2 * $b + $c) / 4;
    }

    $padX = 46;
    $top  = 96;
    $bot  = $h - 150;
    $pts  = [];
    for ($i = 0; $i < $n; $i++) {
        $x = $padX + $i * (($w - 2 * $padX) / ($n - 1));
        $y = $bot - $vals[$i] * ($bot - $top);
        $pts[] = [$x, $y];
    }

    /* ---- Catmull-Rom → cubic bezier for a smooth curve ---- */
    $line = 'M' . round($pts[0][0], 1) . ',' . round($pts[0][1], 1);
    for ($i = 0; $i < $n - 1; $i++) {
        $p0 = $pts[max(0, $i - 1)];
        $p1 = $pts[$i];
        $p2 = $pts[$i + 1];
        $p3 = $pts[min($n - 1, $i + 2)];
        $c1x = $p1[0] + ($p2[0] - $p0[0]) / 6;
        $c1y = $p1[1] + ($p2[1] - $p0[1]) / 6;
        $c2x = $p2[0] - ($p3[0] - $p1[0]) / 6;
        $c2y = $p2[1] - ($p3[1] - $p1[1]) / 6;
        $line .= sprintf('C%.1f,%.1f %.1f,%.1f %.1f,%.1f', $c1x, $c1y, $c2x, $c2y, $p2[0], $p2[1]);
    }
    $area  = $line . sprintf('L%.1f,%d L%.1f,%d Z', $pts[$n - 1][0], $h, $pts[0][0], $h);
    $end   = $pts[$n - 1];

    /* ---- candles ---- */
    $candles = '';
    if ($style === 'candles') {
        $groups  = 26;
        $step    = ($w - 2 * $padX) / $groups;
        $cw      = $step * 0.5;
        for ($g = 0; $g < $groups; $g++) {
            $from = (int)floor($g * $n / $groups);
            $to   = max($from + 1, (int)floor(($g + 1) * $n / $groups));
            $seg  = array_slice($vals, $from, $to - $from);
            if (!$seg) continue;
            $o = $seg[0];
            $c = $seg[count($seg) - 1];
            $hi = max($seg) + 0.03 * $rng();
            $lo = min($seg) - 0.03 * $rng();
            $X  = $padX + $g * $step + $step / 2;
            $Y  = fn ($t) => $bot - $t * ($bot - $top);
            $green = $c >= $o;
            $col   = $green ? $accent : '#f6465d';
            $bodyT = $Y(max($o, $c));
            $bodyB = $Y(min($o, $c));
            if ($bodyB - $bodyT < 3) $bodyB = $bodyT + 3;
            $candles .= sprintf(
                '<line x1="%.1f" y1="%.1f" x2="%.1f" y2="%.1f" stroke="%s" stroke-width="1.6" opacity=".85"/>',
                $X, $Y($hi), $X, $Y($lo), $col
            );
            $candles .= sprintf(
                '<rect x="%.1f" y="%.1f" width="%.1f" height="%.1f" rx="1.6" fill="%s" opacity=".95"/>',
                $X - $cw / 2, $bodyT, $cw, $bodyB - $bodyT, $col
            );
        }
    }
@endphp

<svg class="wf-chart-svg" viewBox="0 0 {{ $w }} {{ $h }}" width="{{ $w }}" height="{{ $h }}"
     preserveAspectRatio="{{ $wide ? 'xMidYMid slice' : 'xMidYMid meet' }}"
     role="img" aria-label="{{ ($symbol ?? '') . ' ' . ($name ?? '') . ' price chart' }}" focusable="false">
    <defs>
        <linearGradient id="{{ $uid }}-fill" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%"   stop-color="{{ $accent }}" stop-opacity=".42"/>
            <stop offset="55%"  stop-color="{{ $accent }}" stop-opacity=".13"/>
            <stop offset="100%" stop-color="{{ $accent }}" stop-opacity="0"/>
        </linearGradient>
        <linearGradient id="{{ $uid }}-bg" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%"   stop-color="{{ $tone }}"/>
            <stop offset="100%" stop-color="#160a3a"/>
        </linearGradient>
        <radialGradient id="{{ $uid }}-glow" cx="50%" cy="50%" r="50%">
            <stop offset="0%"   stop-color="{{ $accent }}" stop-opacity=".85"/>
            <stop offset="100%" stop-color="{{ $accent }}" stop-opacity="0"/>
        </radialGradient>
        <filter id="{{ $uid }}-blur" x="-30%" y="-30%" width="160%" height="160%">
            <feGaussianBlur stdDeviation="7"/>
        </filter>
    </defs>

    <rect x="0" y="0" width="{{ $w }}" height="{{ $h }}" fill="url(#{{ $uid }}-bg)"/>

    {{-- chart grid --}}
    <g stroke="#ffffff" stroke-opacity=".07" stroke-width="1">
        @for ($g = 1; $g < 6; $g++)
            <line x1="0" y1="{{ round($top + ($bot - $top) * $g / 6, 1) }}" x2="{{ $w }}" y2="{{ round($top + ($bot - $top) * $g / 6, 1) }}"/>
        @endfor
        @for ($g = 1; $g < 8; $g++)
            <line x1="{{ round($w * $g / 8, 1) }}" y1="0" x2="{{ round($w * $g / 8, 1) }}" y2="{{ $h }}" stroke-opacity=".045"/>
        @endfor
    </g>

    @if ($style === 'candles')
        {!! $candles !!}
    @else
        <path d="{{ $area }}" fill="url(#{{ $uid }}-fill)"/>
        <path d="{{ $line }}" fill="none" stroke="{{ $accent }}" stroke-opacity=".28"
              stroke-width="9" stroke-linecap="round" filter="url(#{{ $uid }}-blur)"/>
        <path d="{{ $line }}" fill="none" stroke="{{ $accent }}" stroke-width="3.4"
              stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="{{ round($end[0], 1) }}" cy="{{ round($end[1], 1) }}" r="26" fill="url(#{{ $uid }}-glow)"/>
        <circle cx="{{ round($end[0], 1) }}" cy="{{ round($end[1], 1) }}" r="6.5" fill="#ffffff"/>
        <circle cx="{{ round($end[0], 1) }}" cy="{{ round($end[1], 1) }}" r="3.4" fill="{{ $accent }}"/>
    @endif

    {{-- readout plate --}}
    @if (!empty($symbol))
        <g transform="translate({{ $padX }},46)">
            <text x="0" y="0" fill="#ffffff" fill-opacity=".62" font-size="17"
                  font-family="'Plus Jakarta Sans',system-ui,sans-serif" letter-spacing="1.6">{{ $symbol }}</text>
            @if (!empty($price))
                <text x="0" y="40" fill="#ffffff" font-size="40" font-weight="700"
                      font-family="'Plus Jakarta Sans',system-ui,sans-serif"
                      style="font-variant-numeric:tabular-nums">{{ $price }}</text>
            @endif
            @if (!empty($change))
                <text x="{{ $padX + 210 }}" y="40" fill="{{ $up ? $accent : '#f6465d' }}" font-size="26" font-weight="700"
                      font-family="'Plus Jakarta Sans',system-ui,sans-serif"
                      style="font-variant-numeric:tabular-nums">{{ $change }}</text>
            @endif
        </g>
    @endif
</svg>
