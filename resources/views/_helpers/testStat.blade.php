<?php
    $colors = ["#7ed6be","#ecf081","#ffbe40","#ef746f","#bc8696"];
    $edge = -30;
?>
<style>
    body {
        overflow: hidden;
        margin: 0;
        height: 100vh;
        perspective: 100em;
        perspective-origin: 50% calc(50% - 25em);
        //background: #000;
    }

    .block {
        position: absolute;
        top: 50%;
        left: 50%;
        transform-style: preserve-3d;
    }

    .assembly {
        position: absolute;
        top: 75%;
        left: 55%;
        /*transform: rotateY(25grad) translate3d(-2em, -10em, 0)*/;
    }

    .bar {
        transform-origin: 0 2.5em 0;
        animation: grow 0.8s cubic-bezier(0, 0, 0.1, 0);
    }


    @for($i=0;$i<count($statData);$i++)
        .bar:nth-child({!! $i+1 !!})
        {
            margin-left: {!! $edge += 7.5 !!}em;
            transform: scaleY({{$statData[$i][1]==0?0.1:$statData[$i][1]}});
            color: {{$colors[$i]}};
        }
        #grp_{{$i+1}}{ color: {{$colors[$i]}}; }
    @endfor

    /*
    .bar:nth-child(1) {
        margin-left: -22.5em;
        transform: scaleY(5);
        color: #7ed6be;
    }
    .bar:nth-child(2) {
        margin-left: -15em;
        transform: scaleY(5);
        color: #ecf081;
    }
    .bar:nth-child(3) {
        margin-left: -7.5em;
        transform: scaleY(0.5);
        color: #ffbe40;
    }
    .bar:nth-child(4) {
        margin-left: 0em;
        transform: scaleY(5);
        color: #ef746f;
    }
    .bar:nth-child(5) {
        margin-left: 7.5em;
        transform: scaleY(5);
        color: #bc8696;
    }
    */

    @keyframes grow {
        0% { transform: scaleY(0); }
    }
    .face {
        margin: -2.5em;
        width: 5em;
        height: 5em;
        backface-visibility: hidden;
        background: currentColor;
    }
    .face:nth-child(n + 2):before {
        position: absolute;
        top: 100%;
        left: 0;
        width: inherit;
        height: inherit;
        opacity: .1;
        background: inherit;
        content: '';
    }
    .face:nth-child(1) {
        transform: rotate3d(1, 0, 0, 90deg) translateZ(2.5em);
        -webkit-filter: brightness(0.7);
        filter: brightness(0.7);
    }
    .face:nth-child(2) {
        transform: rotate3d(0, 1, 0, -90deg) translateZ(2.5em);
        -webkit-filter: brightness(1);
        filter: brightness(1);
    }
    .face:nth-child(3) {
        transform: rotate3d(0, 1, 0, 0deg) translateZ(2.5em);
        -webkit-filter: brightness(0.85);
        filter: brightness(0.85);
    }
    .face:nth-child(4) {
        transform: rotate3d(0, 1, 0, 90deg) translateZ(2.5em);
        -webkit-filter: brightness(0.55);
        filter: brightness(0.55);
    }


</style>


<ul type="square">
    @for($i=0; $i<count($statData);$i++)
        <li id="grp_{{$i+1}}">{{$statData[$i][0]}} ({{ round(($statData[$i][1]*100)/5,2) }}%)</li>
    @endfor
</ul>

<div class='assembly block'>
    <div class='bar block'>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
    </div>
    <div class='bar block'>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
    </div>
    <div class='bar block'>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
    </div>
    <div class='bar block'>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
    </div>
    <div class='bar block'>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
        <div class='face block'></div>
    </div>
</div>
