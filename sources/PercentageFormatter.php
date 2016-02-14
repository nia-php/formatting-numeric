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
 * Formats a value between 0 and 1 into a localized percentage value.
 */
class PercentageFormatter implements NumericFormatterInterface
{

    /**
     * The used locale.
     *
     * @var string
     */
    private $locale = null;

    /**
     * Number of fraction digits.
     *
     * @var int
     */
    private $digits = null;

    /**
     * Constructor.
     *
     * @param string $locale
     *            The used locale.
     * @param int $digits
     *            Number of fraction digits.
     */
    public function __construct(string $locale, int $digits)
    {
        $this->locale = $locale;
        $this->digits = $digits;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Formatter\FormatterInterface::format($value)
     */
    public function format(string $value): string
    {
        $formatter = new NumberFormatter($this->locale, NumberFormatter::PERCENT);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $this->digits);

        return $formatter->format($value);
    }
}
