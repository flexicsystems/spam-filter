Spam Filter
========================

The Spam-Filter package defines an object-oriented layer for checking strings about spam.

Build-in Filter Types
---------------------
---

### Regex Filter
The Regex Filter is build to match Spam by an array of Regex patterns.
If a regex pattern result matches the input will rate as spam.

### Blacklist Filter
The Blacklist Filter is used to match Spam by an array of patterns. 
If the input contain a pattern it will rate as spam .

### Whitelist Filter
The Whitelist Filter is build to check if the input contains any whitelisted patterns. 
If no whitelisted pattern contained the input will rate as spam.

### Url Filter
The URL Filter is build to match if the input contains url's.

### Duplication Filter
The Duplication Filter is build to match word duplications in text's.
The `$minConsecutiveWords` defines if only words or sentences with a specific length will be matched.
Warning: For larger text this filter performs a lot of operations.

Example
-------
---
```php
$spamFilter = new \ThemePoint\SpamFilter\SpamFilter([
    new \ThemePoint\SpamFilter\Filter\BlacklistFilter([
        'want to buy'
    ]),
    new \ThemePoint\SpamFilter\Filter\RegexFilter([
        '/\[\[url\=.*\]\]/'
    ])
]);

$spamFilter->check(
    'Hello, how are you? Do you want to buy [[url=https://example.com/product]] this Product?'
); // Result: true (both filters detected spam)

$spamFilter->check(
    'Hey my friend. Do you want to test a new PHP Library?'
); // Result: false (No filter detected spam)

```

Create custom filter
-----------------
---

The Spam-Filter supports the creation of custom filters.
The Custom-Filters must implement the `\ThemePoint\SpamFilter\Filter\FilterInterface` with it's defined functions.

Example:
```php

class EmailFilter implements \ThemePoint\SpamFilter\Filter\FilterInterface
{
    public function check($input): bool
    {
        \preg_match_all('/(([^ ].*)@(.*))/', $input, $matches, \PREG_SET_ORDER, 0);
        
        if (\count($matches) > 0) {
            return true;
        }
        
        return false;
    }
}
```

Pay attention to the following behavior of the `check` function:

* Return `true` if spam is detected in input.
* Return `false` if no spam is detected in input.
 
Exceptions
----------
---

You can control how the Spam Filter react if an exception is thrown.
The value of `$responseOnException` is equivalent to the filter results.

If you want that the Spam Filter defines an input as Spam if an exception is thrown set this value to `true`.


Changelog
---------
---
[1.0]
* Initial commit of package

----

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q98R2QXXMTUF6&source=url)