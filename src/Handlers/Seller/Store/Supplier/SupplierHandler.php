<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-27 17:14
 */
namespace Notadd\Mall\Handlers\Seller\Store\Supplier;

use Illuminate\Validation\Rule;
use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Mall\Models\StoreSupplier;

/**
 * Class SupplierHandler.
 */
class SupplierHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->validate($this->request, [
            'id' => [
                Rule::exists('mall_store_suppliers'),
                'numeric',
                'required',
            ],
        ], [
            'id.exists'   => '没有对应的店铺供应商信息',
            'id.numeric'  => '店铺供应商 ID 必须为数值',
            'id.required' => '店铺供应商 ID 必须填写',
        ]);
        $supplier = StoreSupplier::query()->find($this->request->input('id'));
        if ($supplier instanceof StoreSupplier) {
            $this->withCode(200)->withData($supplier)->withMessage('获取供应商信息成功！');
        } else {
            $this->withCode(500)->withError('没有对应的供应商信息！');
        }
    }
}
