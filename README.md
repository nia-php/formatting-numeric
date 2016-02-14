# nia - Numeric Formatter

Component with several numeric formatter implementations such like monetary, percentage and decimal.

## Installation

Require this package with Composer.

```bash
	composer require nia/formatting-numeric
```

## Tests
To run the unit test use the following command:

    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/

## Formatters
The component provides several formatters but you are able to write your own numeric formatter by implementing the `Nia\Formatting\Numeric\NumericFormatterInterface` interface for a more specific use case.

| Formatter | Description |
| --- | --- |
| `Nia\Formatting\Numeric\DecimalFormatter` | Formats a value into a localized decimal value. |
| `Nia\Formatting\Numeric\MonetaryFormatter` | Formats a value into a localized monetary value with currency. |
| `Nia\Formatting\Numeric\PercentageFormatter` | Formats a value between 0 and 1 into a localized percentage value. |


## How to use
The following sample shows you how to use the `Nia\Formatting\Numeric\MonetaryFormatter` and the `Nia\Formatting\Numeric\PercentageFormatter`.

```php
	$formatter = new MonetaryFormatter('de_DE', 'EUR');
	echo $formatter->format('123456789.12'); // 123.456.789,12 €

	$formatter = new MonetaryFormatter('en_US', 'EUR');
	echo $formatter->format('123456789.12'); // €123,456,789.12

	// [...]

	$formatter = new PercentageFormatter('de_DE', 2);
	echo $formatter->format('0.19'); // 19,00 %

	$formatter = new PercentageFormatter('en_us');
	echo $formatter->format('0.1999'); // 19.99%
```
