<?php
/*
* This file is part of the BgyPaginatedResource package.
*
* (c) Boris Guéry <http://borisguery.com/>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Bgy\PaginatedResource;

use Bgy\PaginatedResource\Resource\ArrayResource;

/**
 * @author Valentin Ferriere <valentin.ferriere@gmail.com>
 */
class ArrayResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array  $data
     * @param string $key
     */
    public function testArrayResource($data, $key, $params, $expected)
    {
        $resource = new ArrayResource($data, $key, $params['current_page'], $params['total_items'], $params['items_per_pages']);
        $this->assertSame($key, $resource->getDataKey());
        $this->assertSame($data, $resource->getData());
        $this->assertEquals($expected, $resource->getPaging());
    }

    public static function dataProvider()
    {
        return array(
            array(
                array('Foo', 'Bar', 'Baz', 'Fiz', 'Fuz', 'Faz'),
                'foo',
                array('current_page' => 1, 'total_items' => 6, 'items_per_pages' => 6),
                new Paging(
                    6,
                    1,
                    6,
                    1,
                    6
                )
            ),
            array(
                range(0, 99),
                'range',
                array('current_page' => 1, 'total_items' => 100, 'items_per_pages' => 100),
                new Paging(
                    100,
                    1,
                    100,
                    1,
                    100
                )
            )
        );
    }
}