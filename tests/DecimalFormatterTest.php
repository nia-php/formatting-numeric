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
use Nia\Formatting\Numeric\DecimalFormatter;

/**
 * Unit test for \Nia\Formatting\Numeric\DecimalFormatter.
 */
class DecimalFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Numeric\DecimalFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $digits, $value, $expected)
    {
        $formatter = new DecimalFormatter($locale, (int) $digits);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;0;123456789;123.456.789
de_CH;0;123456789;123'456'789
fr_FR;0;123456789;123 456 789
en_US;0;123456789;123,456,789
de_DE;2;123456789;123.456.789,00
de_CH;2;123456789;123'456'789.00
fr_FR;2;123456789;123 456 789,00
en_US;2;123456789;123,456,789.00
de_DE;0;123456789.99;123.456.790
de_CH;0;123456789.99;123'456'790
fr_FR;0;123456789.99;123 456 790
en_US;0;123456789.99;123,456,790
de_DE;2;123456789.99;123.456.789,99
de_CH;2;123456789.99;123'456'789.99
fr_FR;2;123456789.99;123 456 789,99
en_US;2;123456789.99;123,456,789.99
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
