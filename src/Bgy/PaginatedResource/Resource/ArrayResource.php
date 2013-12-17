<?php
/*
 * This file is part of the BgyPaginatedResource package.
 *
 * (c) Boris Guéry <http://borisguery.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bgy\PaginatedResource\Resource;

use Bgy\PaginatedResource\Paging;
use Bgy\PaginatedResource\Resource\AbstractResource;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class ArrayResource extends AbstractResource
{
    public function __construct(array $data, $dataKey = 'data', $currentPage, $totalItems, $itemsPerPage)
    {
        $totalPages = intval(ceil($totalItems/$itemsPerPage));

        parent::__construct(
            $data,
            $dataKey,
            new Paging(
                $totalItems,
                $totalPages,
                $itemsPerPage,
                $currentPage,
                count($data)
            )
        );
    }
}
