<?php

declare(strict_types=1);

/**
 * Copyright (c) 2021 ThemePoint
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 */

namespace Flexic\SpamFilter\Filter;

final class DuplicationFilter implements FilterInterface
{
    private int $minConsecutiveWords;

    public function __construct(int $minConsecutiveWords = 5)
    {
        $this->minConsecutiveWords = $minConsecutiveWords;
    }

    public function check($input): bool
    {
        \preg_match_all('/([^ ]+)/', $input, $matches, \PREG_SET_ORDER, 0);

        $matches = \array_map(static function (array $match): string {
            return $match[0];
        }, $matches);

        $i = 0;

        while (\count($matches) > $i++) {
            $pattern = $this->getString($matches, ($i - 1));

            if (\is_string($pattern)) {
                \preg_match_all($pattern, $input, $resultMatches, \PREG_SET_ORDER, 0);

                if (\count($resultMatches) > 1) {
                    return true;
                }
            }
        }

        return false;
    }

    private function getString(array &$matches, int $key): ?string
    {
        $patternMatches[] = $matches[$key];

        $i = 0;

        while ($i++ < ($this->minConsecutiveWords - 1)) {
            $x = $key + $i;

            if (\array_key_exists($x, $matches)) {
                $patternMatches[] = $matches[$x];
            }
        }

        $patternMatchesCount = \count($patternMatches);

        if ($patternMatchesCount !== $this->minConsecutiveWords) {
            return null;
        }

        $pattern = '';

        foreach ($patternMatches as $key => $patternMatch) {
            $pattern .= \preg_quote($patternMatch);

            if (($key + 1) !== $patternMatchesCount) {
                $pattern .= '( +)';
            }
        }

        return \sprintf('/(%s)/', $pattern);
    }
}
