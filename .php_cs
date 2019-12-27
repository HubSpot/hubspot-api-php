<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__])
    ->exclude(['vendor', 'var', 'codegen'])
    ->notPath('/cache/')
;

return PhpCsFixer\Config::create()
    ->setFinder($finder)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
    ])
;
