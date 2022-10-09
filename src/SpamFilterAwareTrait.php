<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace Flexic\SpamFilter;

trait SpamFilterAwareTrait
{
    protected SpamFilter $spamFilter;

    public function setSpamFilter(SpamFilter $spamFilter): void
    {
        $this->spamFilter = $spamFilter;
    }
}
