<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php81\Rector\Array_\FirstClassCallableRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnNeverTypeRector;
use Rector\TypeDeclaration\Rector\Closure\AddClosureVoidReturnTypeWhereNoReturnRector;
use RectorLaravel\Rector\ClassMethod\MakeModelAttributesAndScopesProtectedRector;
use RectorLaravel\Set\LaravelSetList;

return RectorConfig::configure()
    ->withPaths([__DIR__ . '/src'])
    ->withTypeCoverageLevel(1)
    ->withDeadCodeLevel(1)
    ->withCodeQualityLevel(1)
    ->withCodingStyleLevel(1)
    ->withSets([
        LaravelSetList::LARAVEL_CODE_QUALITY,  // Basic Laravel code quality
    ])
    ->withSkip([
        AddClosureVoidReturnTypeWhereNoReturnRector::class,
        ClosureToArrowFunctionRector::class,
        ReturnNeverTypeRector::class,
        FirstClassCallableRector::class,
        MakeModelAttributesAndScopesProtectedRector::class,
    ])
    // Use PHP 8.2 (from composer.json)
    ->withPhpSets(php82: true)
    // Skip some paths that might have complex legacy code
    ->withSkip([
        __DIR__ . '/vendor',
    ]);
