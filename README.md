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

Changelog
---------
---
[1.0]
* Initial commit of package

----

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q98R2QXXMTUF6&source=url)