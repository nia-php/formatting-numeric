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
use Nia\Formatting\Numeric\MonetaryFormatter;

/**
 * Unit test for \Nia\Formatting\Numeric\MonetaryFormatter.
 */
class MonetaryFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Numeric\MonetaryFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $currency, $value, $expected)
    {
        $formatter = new MonetaryFormatter($locale, $currency);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;EUR;123456789.12;123.456.789,12 €
de_CH;EUR;123456789.12;€ 123'456'789.12
fr_FR;EUR;123456789.12;123 456 789,12 €
en_US;EUR;123456789.12;€123,456,789.12
de_DE;USD;123456789.12;123.456.789,12 $
de_CH;USD;123456789.12;\$ 123'456'789.12
fr_FR;USD;123456789.12;123 456 789,12 \$US
en_US;USD;123456789.12;$123,456,789.12
de_DE;CAD;123456789.12;123.456.789,12 CA$
de_CH;CAD;123456789.12;CA\$ 123'456'789.12
fr_FR;CAD;123456789.12;123 456 789,12 \$CA
en_US;CAD;123456789.12;CA$123,456,789.12
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
