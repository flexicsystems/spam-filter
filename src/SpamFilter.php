<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter;

use ThemePoint\SpamFilter\Filter\FilterInterface;

final class SpamFilter
{
    private array $filter;

    /**
     * @param array<int, FilterInterface> $filter
     */
    public function __construct(array $filter = [])
    {
        $this->filter = $filter;
    }

    /**
     * @param mixed $input
     */
    public function check($input): bool
    {
        foreach ($this->filter as $filter) {
            if ($filter->check($input)) {
                return true;
            }
        }

        return false;
    }
}
