<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter\Filter;

final class BlacklistFilter implements FilterInterface
{
    /**
     * @var array<int, mixed>
     */
    private array $blacklist;

    public function __construct(array $blacklist = [])
    {
        $this->blacklist = [];

        foreach ($blacklist as $entry) {
            $this->blacklist[] = \mb_strtolower($entry);
        }
    }

    public function check($input): bool
    {
        $input = \mb_strtolower($input);

        foreach ($this->blacklist as $entry) {
            if (\mb_strpos($input, $entry) !== false) {
                return true;
            }
        }

        return false;
    }
}
