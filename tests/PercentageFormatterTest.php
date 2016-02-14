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
namespace Test\Nia\Formatting\Numeric;

use PHPUnit_Framework_TestCase;
use Nia\Formatting\Numeric\PercentageFormatter;

/**
 * Unit test for \Nia\Formatting\Numeric\PercentageFormatter.
 */
class PercentageFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Numeric\PercentageFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $digits, $value, $expected)
    {
        $formatter = new PercentageFormatter($locale, (int) $digits);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;0;0.19;19 %
de_DE;0;0.1999;20 %
de_DE;2;0.19;19,00 %
de_DE;2;0.1999;19,99 %
en_US;0;0.19;19%
en_US;0;0.1999;20%
en_US;2;0.19;19.00%
en_US;2;0.1999;19.99%
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
