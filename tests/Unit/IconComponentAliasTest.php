<?php

declare(strict_types=1);

namespace Tests\Unit;

use ZaimeaLabs\Heroicons\Icon;
use Illuminate\View\Compilers\BladeCompiler;
use Tests\TestCase;

class RegisterIconComponentAliasTest extends TestCase
{
    /**
     * @define-env defineEnvironmentIconAllias
     */
    public function test_should_register_the_icon_blade_component_with_a_custom_alias()
    {
        $bladeCompiler = resolve(BladeCompiler::class);

        $aliases = $bladeCompiler->getClassComponentAliases();

        $this->assertArrayHasKey('custom', $aliases, 'The custom alias should be registered');
        $this->assertSame($aliases['custom'], Icon::class);
    }

    /**
     * @define-env defineEnvironmentIconAlliasFalse
     */
    public function test_should_not_register_the_icon_component()
    {
        $bladeCompiler = resolve(BladeCompiler::class);

        $aliases = $bladeCompiler->getClassComponentAliases();

        $this->assertArrayNotHasKey('custom', $aliases, "The custom alias shouldn't be registered");
    }
}
