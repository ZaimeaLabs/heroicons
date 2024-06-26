<?php

declare(strict_types=1);

namespace Tests;

use ZaimeaLabs\Heroicons\HeroiconsServiceProvider;
use Orchestra\Testbench\TestCase as OrchestaTestCase;
use ReflectionClass;

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
