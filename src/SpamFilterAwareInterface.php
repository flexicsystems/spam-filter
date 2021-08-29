<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace ThemePoint\SpamFilter;

interface SpamFilterAwareInterface
{
    /**
     * Set the Spam-Filter.
     *
     * @var SpamFilter
     */
    public function setSpamFilter(SpamFilter $spamFilter): void;
}
