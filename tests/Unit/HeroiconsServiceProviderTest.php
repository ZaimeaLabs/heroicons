<?php

declare(strict_types=1);

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

it('should register the views path', function () {
    $view = View::getFacadeRoot();

    $finder = $view->getFinder();
    expect($finder->getHints())->toHaveKey('heroicons');
    expect($finder->getHints()['heroicons'][0])->toContain('resources/views');
});

it('should merge the heroicons config', function () {
    expect(config('heroicons'))->toHaveKeys([
        'variant',
        'alias',
    ]);
});

it('should add the publish groups', function () {
    $publishGroups = ServiceProvider::$publishGroups;

    expect($publishGroups)->toHaveKeys([
        'heroicons.config',
    ]);

    $expected = 'config' . DIRECTORY_SEPARATOR . 'heroicons.php';

    expect($publishGroups['heroicons.config'])->toBeArray()->toHaveCount(1);
    expect(array_key_first($publishGroups['heroicons.config']))->toBeFile();
    expect(array_values($publishGroups['heroicons.config'])[0])->toEndWith($expected);
});

it('should register the blade components', function () {
    $bladeCompiler = resolve(BladeCompiler::class);

    expect($bladeCompiler->getClassComponentAliases())->toHaveKey('icon');
});
