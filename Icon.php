<?php

declare(strict_types=1);

namespace ZaimeaLabs\Heroicons;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public function __construct(
        public string   $name,
        public ?string  $variant = null,
        public bool     $solid   = false,
        public bool     $outline = false,
        public bool     $mini    = false,
        public bool     $micro   = false,
    )
    {
        $this->variant = $this->getVariant();

        if ($mini || $this->variant === 'mini')
        {
            $this->variant = 'mini.solid';
        }

        if ($micro || $this->variant === 'micro') {
            $this->variant = 'micro.solid';
        }
    }

    private function getVariant(): string
    {
        return match (true)
        {
            (bool) $this->variant => $this->variant,
            $this->solid          => 'solid',
            $this->outline        => 'outline',
            $this->mini           => 'mini.solid',
            $this->micro          => 'micro.solid',
            default               => $this->defaultVariant(),
        };
    }

    protected function defaultVariant(): string
    {
        return config('heroicons.variant');
    }

    public function render(): View|Factory
    {
        /** @phpstan-ignore-next-line */
        return view("heroicons::components.{$this->variant}.{$this->name}");
    }
}
