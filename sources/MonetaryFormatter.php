<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Nia\Formatting\Numeric;

use NumberFormatter;

/**
 * Formats a value into a localized monetary value with currency.
 */
class MonetaryFormatter implements NumericFormatterInterface
{

    /**
     * The used locale.
     *
     * @var string
     */
    private $locale = null;

    /**
     * The used currency.
     *
     * @var string
     */
    private $currency = null;

    /**
     * Constructor.
     *
     * @param string $locale
     *            The used locale.
     * @param string $currency
     *            The used currency.
     */
    public function __construct(string $locale, string $currency)
    {
        $this->locale = $locale;
        $this->currency = $currency;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Formatter\FormatterInterface::format($value)
     */
    public function format(string $value): string
    {
        $formatter = new NumberFormatter($this->locale, NumberFormatter::CURRENCY);

        return $formatter->formatCurrency((float) $value, $this->currency);
    }
}
