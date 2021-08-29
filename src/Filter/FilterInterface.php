<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter\Filter;

interface FilterInterface
{
    /**
     * @param mixed $input
     */
    public function check($input): bool;
}
