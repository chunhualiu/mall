<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-27 17:25
 */
namespace Notadd\Mall\Controllers\Api\Seller;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Seller\Store\Outlet\OutletHandler;

/**
 * Class StoreOutletHandler.
 */
class StoreOutletController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Seller\Store\Outlet\OutletHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function outlet(OutletHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
