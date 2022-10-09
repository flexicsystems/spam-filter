<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace Flexic\SpamFilter\Filter;

final class WhitelistFilter implements FilterInterface
{
    /**
     * @var array<int, mixed>
     */
    private array $whitelist;

    public function __construct(array $whitelist = [])
    {
        $this->whitelist = [];

        foreach ($whitelist as $entry) {
            $this->whitelist[] = \mb_strtolower($entry);
        }
    }

    public function check($input): bool
    {
        $input = \mb_strtolower($input);

        foreach ($this->whitelist as $entry) {
            if (\mb_strpos($input, $entry) === false) {
                return true;
            }
        }

        return false;
    }
}
