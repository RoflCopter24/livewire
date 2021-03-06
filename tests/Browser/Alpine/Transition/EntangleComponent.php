<?php

namespace Tests\Browser\Alpine\Transition;

use Illuminate\Support\Facades\View;
use Livewire\Component as BaseComponent;

class EntangleComponent extends BaseComponent
{
    public $show = true;
    public $changeDom = false;

    public function render()
    {
        return <<<'EOD'
<div>
    <div x-data="{ show: @entangle('show') }">
        <button x-on:click="show = ! show" dusk="button">Toggle</button>
        <button wire:click="$toggle('changeDom')" dusk="change-dom">Change DOM</button>

        <div x-show="show" dusk="outer">
            <div x-show.transition.duration.250ms="show" dusk="inner">
                <h1>@if ($changeDom) @json($show) @else static-filler @endif</h1>
            </div>
        </div>
    </div>
</div>

EOD;
    }
}
