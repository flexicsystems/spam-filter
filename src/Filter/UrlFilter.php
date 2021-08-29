<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter\Filter;

final class UrlFilter implements FilterInterface
{
    public function check($input): bool
    {
        $input = \mb_strtolower($input);

        \preg_match_all('/(http(s)?)\:\/\/([a-zA-Z0-9]+).(.+)/', $input, $matches, \PREG_SET_ORDER, 0);

        if (\count($matches) > 0) {
            return true;
        }

        return false;
    }
}
