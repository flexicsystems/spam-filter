<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer\Config;

$year = \date('Y');

$header = <<<TXT
Copyright (c) {$year} ThemePoint
@author Hendrik Legge <hendrik.legge@themepoint.de>
@version 1.0.0
TXT;

$config = Config\Factory::fromRuleSet(new Config\RuleSet\Php74($header));

$config->getFinder()
    ->exclude([
        'vendor/'
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->name('.php_cs')
    ->name('.php_cs.src')
    ->notName('.env.local.php');

return $config;