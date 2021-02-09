<a href="/">
    @php
    $words = explode(" ", config('app.name'));
    $acronym = "";

    foreach ($words as $w) {
    $acronym .= $w[0];
    }
    @endphp
    <span class="font-bold text-white rounded-full flex items-center justify-center font-mono"
        style="height: 50px; width: 50px; font-size: 25px; background: #6875F5;">{{ $acronym}}</span>
</a>
