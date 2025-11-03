<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestaTestCase;
use ReflectionClass;
use Zaimea\Heroicons\HeroiconsServiceProvider;

abstract class TestCase extends OrchestaTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HeroiconsServiceProvider::class,
        ];
    }

    protected function defineEnvironmentIconAllias($app)
    {
        $app['config']->set('heroicons.alias', 'custom');
    }

    protected function defineEnvironmentIconAlliasFalse($app)
    {
        $app['config']->set('heroicons.alias', false);
    }

    public function invokeMethod(mixed $object, string $method, array $parameters = []): mixed
    {
        $reflection = new ReflectionClass(get_class($object));
        $method     = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
