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

    private bool $responseOnException;

    /**
     * @param array<int, FilterInterface> $filter
     */
    public function __construct(array $filter = [], bool $responseOnException = false)
    {
        $this->filter = $filter;
        $this->responseOnException = $responseOnException;
    }

    /**
     * @param mixed $input
     */
    public function check($input): bool
    {
        foreach ($this->filter as $filter) {
            try {
                if ($filter->check($input)) {
                    return true;
                }
            } catch (\Exception $exception) {
                return $this->responseOnException;
            }
        }

        return false;
    }
}
