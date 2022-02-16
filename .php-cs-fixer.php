<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__])
    ->exclude(['vendor', 'var', 'codegen'])
    ->notPath('/cache/')
;

$config = new PhpCsFixer\Config();

return $config
    ->setFinder($finder)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
    ])
;
