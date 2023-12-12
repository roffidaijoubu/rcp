<?php

namespace App\View\Components;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class AuditTab extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $icon = null,
        public ?string $badge = null,
    ) {
        $this->uuid = Str::uuid();
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    @aware(['tabContainer' =>  ''])
                    <a
                        @click="selected = '{{ $name }}'"
                        class="item"
                        :class="{ 'active': selected === '{{ $name }}' }"
                        {{ $attributes->whereDoesntStartWith('class') }}
                      >
                      @if($badge)
                      <div class="badge w-[50px] badge-neutral pb-[.15em]">
                          {{$badge}}
                      </div>
                        @endif
                        {{ $label }}
                    </a>

                    <div wire:key="{{ $name }}-{{ rand() }}">
                        <template x-teleport="#{{ $tabContainer }}">
                            <div x-show="selected === '{{ $name }}'" {{ $attributes->class(['']) }}>
                                {{ $slot }}
                            </div>
                        </template>
                    </div>
                HTML;
    }
}
