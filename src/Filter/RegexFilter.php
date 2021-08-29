<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter\Filter;

final class RegexFilter implements FilterInterface
{
    /**
     * @var array<int, string>
     */
    private array $regexPattern;

    public function __construct(array $regexPattern = [])
    {
        $this->regexPattern = $regexPattern;
    }

    public function check($input): bool
    {
        foreach ($this->regexPattern as $pattern) {
            \preg_match_all($pattern, $input, $matches, \PREG_SET_ORDER, 0);

            if (\count($matches) > 0) {
                return true;
            }
        }

        return false;
    }
}
