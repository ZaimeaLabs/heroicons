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
    )
    {
        $this->variant = $this->getVariant();

        if ($mini || $this->variant === 'mini')
        {
            $this->variant = 'mini.solid';
        }
    }

    private function getVariant(): ?string
    {
        return match (true)
        {
            (bool) $this->variant => $this->variant,
            $this->solid          => 'solid',
            $this->outline        => 'outline',
            $this->mini           => 'mini.solid',
            default               => $this->defaultVariant(),
        };
    }

    protected function defaultVariant(): string
    {
        return config('heroicons.variant');
    }

    public function render(): View|Factory
    {
        return view("heroicons::components.{$this->variant}.{$this->name}");
    }
}
