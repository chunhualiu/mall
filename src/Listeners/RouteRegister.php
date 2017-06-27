<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-03-22 16:50
 */
namespace Notadd\Mall\Listeners;

use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;
use Notadd\Mall\Controllers\Api\Administration\AddressController as AddressControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ProductBrandController as ProductBrandControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ProductCategoryController as ProductCategoryControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationAdvertisementController as ConfigurationAdvertisementControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationAdvertisementPositionController as ConfigurationAdvertisementPositionControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationController as ConfigurationControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationExpressController as ConfigurationExpressControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationImageController as ConfigurationImageControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationImageDefaultController as ConfigurationImageDefaultControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationMessageController as ConfigurationMessageControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationPayController as ConfigurationPayControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationSearchController as ConfigurationSearchControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ConfigurationSearchHotController as ConfigurationSearchHotControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderController as OrderControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderExchangeController as OrderExchangeControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderExpressController as OrderExpressControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderInvoiceController as OrderInvoiceControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderProcessController as OrderProcessControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderRateController as OrderRateControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\OrderRefundController as OrderRefundControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ProductController as ProductControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StatisticsSalesController as StatisticsSalesControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StoreCategoryController as StoreCategoryControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StoreController as StoreControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StoreDynamicController as StoreDynamicControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StoreRateController as StoreRateControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\ProductSpecificationController as ProductSpecificationControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StatisticsAnalysisController as StatisticsAnalysisControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StatisticsController as StatisticsControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StatisticsMemberController as StatisticsMemberControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\StatisticsStoreController as StatisticsStoreControllerForAdministration;
use Notadd\Mall\Controllers\Api\Administration\UploadController as UploadControllerForAdministration;
use Notadd\Mall\Controllers\Api\Seller\OrderController as OrderControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\OrderExpressController as OrderExpressControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreOutletController as StoreOutletControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ProductCategoryController as ProductCategoryControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ProductController as ProductControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ProductSpecificationController as ProductSpecificationControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ProductSubscribeController as ProductSubscribeControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ServiceController as ServiceControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\ServiceRefundController as ServiceRefundControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreBrandController as StoreBrandControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreCategoryController as StoreCategoryControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreConfigurationController as StoreConfigurationControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreController as StoreControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreDynamicController as StoreDynamicControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreInformationController as StoreInformationControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreNavigationController as StoreNavigationControllerForSeller;
use Notadd\Mall\Controllers\Api\Seller\StoreSupplierController as StoreSupplierControllerForSeller;
use Notadd\Mall\Controllers\Api\Store\CategoryController as CategoryControllerForStore;
use Notadd\Mall\Controllers\Api\Store\ProductController as ProductControllerForStore;
use Notadd\Mall\Controllers\Api\Store\ProductRateController as ProductRateControllerForStore;
use Notadd\Mall\Controllers\Api\Store\StoreController as StoreControllerForStore;
use Notadd\Mall\Controllers\Api\User\CardController as CardControllerForUser;
use Notadd\Mall\Controllers\Api\User\CouponController as CouponControllerForUser;
use Notadd\Mall\Controllers\Api\User\OrderController as OrderControllerForUser;
use Notadd\Mall\Controllers\Api\User\RateController as RateControllerForUser;
use Notadd\Mall\Controllers\Api\User\UserController as UserControllerForUser;
use Notadd\Mall\Controllers\Api\User\FollowController as FollowControllerForUser;
use Notadd\Mall\Controllers\Api\User\VipController as VipControllerForUser;
use Notadd\Mall\Controllers\MallController as MallControllerForForeground;
use Notadd\Mall\Controllers\StoreController as StoreControllerForForeground;
use Notadd\Mall\Controllers\UserController as UserControllerForForeground;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Register.
     */
    public function handle()
    {
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/mall/admin'], function () {
            $this->router->post('address', AddressControllerForAdministration::class . '@address');
            $this->router->post('address/edit', AddressControllerForAdministration::class . '@edit');
            $this->router->post('address/list', AddressControllerForAdministration::class . '@list');
            $this->router->post('configuration/get', ConfigurationControllerForAdministration::class . '@get');
            $this->router->post('configuration/set', ConfigurationControllerForAdministration::class . '@set');
            $this->router->post('configuration/advertisement/create', ConfigurationAdvertisementControllerForAdministration::class . '@create');
            $this->router->post('configuration/advertisement/edit', ConfigurationAdvertisementControllerForAdministration::class . '@edit');
            $this->router->post('configuration/advertisement/list', ConfigurationAdvertisementControllerForAdministration::class . '@list');
            $this->router->post('configuration/advertisement/remove', ConfigurationAdvertisementControllerForAdministration::class . '@remove');
            $this->router->post('configuration/advertisement/position/create', ConfigurationAdvertisementPositionControllerForAdministration::class . '@create');
            $this->router->post('configuration/advertisement/position/edit', ConfigurationAdvertisementPositionControllerForAdministration::class . '@edit');
            $this->router->post('configuration/advertisement/position/list', ConfigurationAdvertisementPositionControllerForAdministration::class . '@list');
            $this->router->post('configuration/advertisement/position/remove', ConfigurationAdvertisementPositionControllerForAdministration::class . '@remove');
            $this->router->post('configuration/express/get', ConfigurationExpressControllerForAdministration::class . '@get');
            $this->router->post('configuration/express/set', ConfigurationExpressControllerForAdministration::class . '@set');
            $this->router->post('configuration/image/get', ConfigurationImageControllerForAdministration::class . '@get');
            $this->router->post('configuration/image/set', ConfigurationImageControllerForAdministration::class . '@set');
            $this->router->post('configuration/image/default/get', ConfigurationImageDefaultControllerForAdministration::class . '@get');
            $this->router->post('configuration/image/default/set', ConfigurationImageDefaultControllerForAdministration::class . '@set');
            $this->router->post('configuration/message/create', ConfigurationMessageControllerForAdministration::class . '@create');
            $this->router->post('configuration/message/edit', ConfigurationMessageControllerForAdministration::class . '@edit');
            $this->router->post('configuration/message/list', ConfigurationMessageControllerForAdministration::class . '@list');
            $this->router->post('configuration/message/remove', ConfigurationMessageControllerForAdministration::class . '@remove');
            $this->router->post('configuration/pay/get', ConfigurationPayControllerForAdministration::class . '@get');
            $this->router->post('configuration/pay/set', ConfigurationPayControllerForAdministration::class . '@set');
            $this->router->post('configuration/search/get', ConfigurationSearchControllerForAdministration::class . '@get');
            $this->router->post('configuration/search/set', ConfigurationSearchControllerForAdministration::class . '@set');
            $this->router->post('configuration/search/hot/create', ConfigurationSearchHotControllerForAdministration::class . '@create');
            $this->router->post('configuration/search/hot/edit', ConfigurationSearchHotControllerForAdministration::class . '@edit');
            $this->router->post('configuration/search/hot/list', ConfigurationSearchHotControllerForAdministration::class . '@list');
            $this->router->post('configuration/search/hot/remove', ConfigurationSearchHotControllerForAdministration::class . '@remove');
            $this->router->post('order', OrderControllerForAdministration::class . '@order');
            $this->router->post('order/edit', OrderControllerForAdministration::class . '@edit');
            $this->router->post('order/list', OrderControllerForAdministration::class . '@list');
            $this->router->post('order/remove', OrderControllerForAdministration::class . '@remove');
            $this->router->post('order/restore', OrderControllerForAdministration::class . '@restore');
            $this->router->post('order/exchange/confirm', OrderExchangeControllerForAdministration::class . '@confirm');
            $this->router->post('order/exchange/finish', OrderExchangeControllerForAdministration::class . '@finish');
            $this->router->post('order/exchange/list', OrderExchangeControllerForAdministration::class . '@list');
            $this->router->post('order/exchange/send', OrderExchangeControllerForAdministration::class . '@send');
            $this->router->post('order/express/list', OrderExpressControllerForAdministration::class . '@list');
            $this->router->post('order/express/trace', OrderExpressControllerForAdministration::class . '@trace');
            $this->router->post('order/express/typing', OrderExpressControllerForAdministration::class . '@typing');
            $this->router->post('order/invoice', OrderInvoiceControllerForAdministration::class . '@invoice');
            $this->router->post('order/invoice/create', OrderInvoiceControllerForAdministration::class . '@create');
            $this->router->post('order/invoice/edit', OrderInvoiceControllerForAdministration::class . '@edit');
            $this->router->post('order/invoice/list', OrderInvoiceControllerForAdministration::class . '@list');
            $this->router->post('order/invoice/remove', OrderInvoiceControllerForAdministration::class . '@remove');
            $this->router->post('order/rate', OrderRateControllerForAdministration::class . '@rate');
            $this->router->post('order/rate', OrderRateControllerForAdministration::class . '@rate');
            $this->router->post('order/rate/edit', OrderRateControllerForAdministration::class . '@edit');
            $this->router->post('order/rate/list', OrderRateControllerForAdministration::class . '@list');
            $this->router->post('order/refund/confirm', OrderRefundControllerForAdministration::class . '@confirm');
            $this->router->post('order/refund/finish', OrderRefundControllerForAdministration::class . '@finish');
            $this->router->post('order/refund/list', OrderRefundControllerForAdministration::class . '@list');
            $this->router->post('order/process/confirm', OrderProcessControllerForAdministration::class . '@confirm');
            $this->router->post('order/process/create', OrderProcessControllerForAdministration::class . '@create');
            $this->router->post('order/process/finish', OrderProcessControllerForAdministration::class . '@finish');
            $this->router->post('order/process/pay', OrderProcessControllerForAdministration::class . '@pay');
            $this->router->post('order/process/send', OrderProcessControllerForAdministration::class . '@send');
            $this->router->post('product', ProductControllerForAdministration::class . '@product');
            $this->router->post('product/create', ProductControllerForAdministration::class . '@create');
            $this->router->post('product/edit', ProductControllerForAdministration::class . '@edit');
            $this->router->post('product/list', ProductControllerForAdministration::class . '@list');
            $this->router->post('product/remove', ProductControllerForAdministration::class . '@remove');
            $this->router->post('product/restore', ProductControllerForAdministration::class . '@restore');
            $this->router->post('product/brand', ProductBrandControllerForAdministration::class . '@brand');
            $this->router->post('product/brand/access', ProductBrandControllerForAdministration::class . '@access');
            $this->router->post('product/brand/create', ProductBrandControllerForAdministration::class . '@create');
            $this->router->post('product/brand/edit', ProductBrandControllerForAdministration::class . '@edit');
            $this->router->post('product/brand/list', ProductBrandControllerForAdministration::class . '@list');
            $this->router->post('product/brand/remove', ProductBrandControllerForAdministration::class . '@remove');
            $this->router->post('product/category', ProductCategoryControllerForAdministration::class . '@category');
            $this->router->post('product/category/create', ProductCategoryControllerForAdministration::class . '@create');
            $this->router->post('product/category/edit', ProductCategoryControllerForAdministration::class . '@edit');
            $this->router->post('product/category/list', ProductCategoryControllerForAdministration::class . '@list');
            $this->router->post('product/category/remove', ProductCategoryControllerForAdministration::class . '@remove');
            $this->router->post('product/category/restore', ProductCategoryControllerForAdministration::class . '@restore');
            $this->router->post('store/create', StoreControllerForAdministration::class . '@create');
            $this->router->post('store/edit', StoreControllerForAdministration::class . '@edit');
            $this->router->post('store/list', StoreControllerForAdministration::class . '@list');
            $this->router->post('store/remove', StoreControllerForAdministration::class . '@remove');
            $this->router->post('store/restore', StoreControllerForAdministration::class . '@restore');
            $this->router->post('store/category', StoreCategoryControllerForAdministration::class . '@category');
            $this->router->post('store/category/create', StoreCategoryControllerForAdministration::class . '@create');
            $this->router->post('store/category/edit', StoreCategoryControllerForAdministration::class . '@edit');
            $this->router->post('store/category/list', StoreCategoryControllerForAdministration::class . '@list');
            $this->router->post('store/category/remove', StoreCategoryControllerForAdministration::class . '@remove');
            $this->router->post('store/category/restore', StoreCategoryControllerForAdministration::class . '@restore');
            $this->router->post('store/dynamic', StoreDynamicControllerForAdministration::class . '@dynamic');
            $this->router->post('store/dynamic/edit', StoreDynamicControllerForAdministration::class . '@edit');
            $this->router->post('store/dynamic/list', StoreDynamicControllerForAdministration::class . '@dynamic');
            $this->router->post('store/dynamic/remove', StoreDynamicControllerForAdministration::class . '@remove');
            $this->router->post('store/rate', StoreRateControllerForAdministration::class . '@rate');
            $this->router->post('store/rate/edit', StoreRateControllerForAdministration::class . '@edit');
            $this->router->post('store/rate/list', StoreRateControllerForAdministration::class . '@list');
            $this->router->post('specification', ProductSpecificationControllerForAdministration::class . '@specification');
            $this->router->post('specification/create', ProductSpecificationControllerForAdministration::class . '@create');
            $this->router->post('specification/edit', ProductSpecificationControllerForAdministration::class . '@edit');
            $this->router->post('specification/list', ProductSpecificationControllerForAdministration::class . '@list');
            $this->router->post('specification/remove', ProductSpecificationControllerForAdministration::class . '@remove');
            $this->router->post('statistics', StatisticsControllerForAdministration::class . '@get');
            $this->router->post('statistics/analysis', StatisticsAnalysisControllerForAdministration::class . '@dashboard');
            $this->router->post('statistics/analysis', StatisticsAnalysisControllerForAdministration::class . '@dashboard');
            $this->router->post('statistics/analysis/industry', StatisticsAnalysisControllerForAdministration::class . '@industry');
            $this->router->post('statistics/analysis/price', StatisticsAnalysisControllerForAdministration::class . '@price');
            $this->router->post('statistics/member', StatisticsMemberControllerForAdministration::class . '@member');
            $this->router->post('statistics/member/area', StatisticsMemberControllerForAdministration::class . '@area');
            $this->router->post('statistics/member/newly', StatisticsMemberControllerForAdministration::class . '@newly');
            $this->router->post('statistics/sales', StatisticsSalesControllerForAdministration::class . '@income');
            $this->router->post('statistics/sales/order', StatisticsSalesControllerForAdministration::class . '@order');
            $this->router->post('statistics/store/area', StatisticsStoreControllerForAdministration::class . '@area');
            $this->router->post('statistics/store/hots', StatisticsStoreControllerForAdministration::class . '@hots');
            $this->router->post('statistics/store/newly', StatisticsStoreControllerForAdministration::class . '@newly');
            $this->router->post('statistics/store/sales', StatisticsStoreControllerForAdministration::class . '@sales');
            $this->router->post('upload', UploadControllerForAdministration::class . '@handle');
        });
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/mall/seller'], function () {
            $this->router->post('order', OrderControllerForSeller::class . '@order');
            $this->router->post('order/list', OrderControllerForSeller::class . '@list');
            $this->router->post('order/process', OrderControllerForSeller::class . '@process');
            $this->router->post('order/express/configuration', OrderExpressControllerForSeller::class . '@configuration');
            $this->router->post('order/express/delivery', OrderExpressControllerForSeller::class . '@delivery');
            $this->router->post('order/express/order', OrderExpressControllerForSeller::class . '@order');
            $this->router->post('order/express/template', OrderExpressControllerForSeller::class . '@template');
            $this->router->post('service', ServiceControllerForSeller::class . '@list');
            $this->router->post('service/remove', ServiceControllerForSeller::class . '@remove');
            $this->router->post('service/refund', ServiceRefundControllerForSeller::class . '@refund');
            $this->router->post('service/refund/list', ServiceRefundControllerForSeller::class . '@list');
            $this->router->post('service/refund/process', ServiceRefundControllerForSeller::class . '@process');
            $this->router->post('store', StoreControllerForSeller::class . '@store');
            $this->router->post('store/renew', StoreControllerForSeller::class . '@renew');
            $this->router->post('store/brand', StoreBrandControllerForSeller::class . '@brand');
            $this->router->post('store/brand/apply', StoreBrandControllerForSeller::class . '@apply');
            $this->router->post('store/brand/edit', StoreBrandControllerForSeller::class . '@edit');
            $this->router->post('store/brand/list', StoreBrandControllerForSeller::class . '@list');
            $this->router->post('store/brand/revoke', StoreBrandControllerForSeller::class . '@revoke');
            $this->router->post('store/category', StoreCategoryControllerForSeller::class . '@category');
            $this->router->post('store/category/edit', StoreCategoryControllerForSeller::class . '@edit');
            $this->router->post('store/category/list', StoreCategoryControllerForSeller::class . '@list');
            $this->router->post('store/category/remove', StoreCategoryControllerForSeller::class . '@remove');
            $this->router->post('store/configuration', StoreConfigurationControllerForSeller::class . '@configuration');
            $this->router->post('store/configuration/carousel', StoreConfigurationControllerForSeller::class . '@carousel');
            $this->router->post('store/configuration/setting', StoreConfigurationControllerForSeller::class . '@settings');
            $this->router->post('store/dynamic', StoreDynamicControllerForSeller::class . '@dynamic');
            $this->router->post('store/dynamic/configuration', StoreDynamicControllerForSeller::class . '@configuration');
            $this->router->post('store/dynamic/create', StoreDynamicControllerForSeller::class . '@create');
            $this->router->post('store/dynamic/edit', StoreDynamicControllerForSeller::class . '@edit');
            $this->router->post('store/dynamic/list', StoreDynamicControllerForSeller::class . '@list');
            $this->router->post('store/dynamic/remove', StoreDynamicControllerForSeller::class . '@remove');
            $this->router->post('store/dynamic/restore', StoreDynamicControllerForSeller::class . '@restore');
            $this->router->post('store/information', StoreInformationControllerForSeller::class . '@information');
            $this->router->post('store/information/renew', StoreInformationControllerForSeller::class . '@renew');
            $this->router->post('store/navigation', StoreNavigationControllerForSeller::class . '@navigation');
            $this->router->post('store/navigation/create', StoreNavigationControllerForSeller::class . '@create');
            $this->router->post('store/navigation/edit', StoreNavigationControllerForSeller::class . '@edit');
            $this->router->post('store/navigation/list', StoreNavigationControllerForSeller::class . '@list');
            $this->router->post('store/navigation/remove', StoreNavigationControllerForSeller::class . '@remove');
            $this->router->post('store/outlet', StoreOutletControllerForSeller::class . '@outlet');
            $this->router->post('store/product', ProductControllerForSeller::class . '@product');
            $this->router->post('store/product/create', ProductControllerForSeller::class . '@create');
            $this->router->post('store/product/edit', ProductControllerForSeller::class . '@edit');
            $this->router->post('store/product/list', ProductControllerForSeller::class . '@list');
            $this->router->post('store/product/remove', ProductControllerForSeller::class . '@remove');
            $this->router->post('store/product/category', ProductCategoryControllerForSeller::class . '@category');
            $this->router->post('store/product/category/list', ProductCategoryControllerForSeller::class . '@list');
            $this->router->post('store/product/subscribe/list', ProductSubscribeControllerForSeller::class . '@list');
            $this->router->post('store/product/subscribe/remove', ProductSubscribeControllerForSeller::class . '@remove');
            $this->router->post('store/product/specifications', ProductSpecificationControllerForSeller::class . '@specifications');
            $this->router->post('store/product/specifications/create', ProductSpecificationControllerForSeller::class . '@create');
            $this->router->post('store/product/specifications/edit', ProductSpecificationControllerForSeller::class . '@edit');
            $this->router->post('store/product/specifications/list', ProductSpecificationControllerForSeller::class . '@list');
            $this->router->post('store/product/specifications/remove', ProductSpecificationControllerForSeller::class . '@remove');
            $this->router->post('store/supplier', StoreSupplierControllerForSeller::class . '@supplier');
            $this->router->post('store/supplier/create', StoreSupplierControllerForSeller::class . '@create');
            $this->router->post('store/supplier/edit', StoreSupplierControllerForSeller::class . '@edit');
            $this->router->post('store/supplier/list', StoreSupplierControllerForSeller::class . '@list');
            $this->router->post('store/supplier/remove', StoreSupplierControllerForSeller::class . '@remove');
        });
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/mall/store'], function () {
            $this->router->post('/', StoreControllerForStore::class . '@store');
            $this->router->post('list', StoreControllerForStore::class . '@list');
            $this->router->post('category', CategoryControllerForStore::class . '@category');
            $this->router->post('category/list', CategoryControllerForStore::class . '@list');
            $this->router->post('product', ProductControllerForStore::class . '@product');
            $this->router->post('product/list', ProductControllerForStore::class . '@list');
            $this->router->post('product/rate', ProductRateControllerForStore::class . '@rate');
            $this->router->post('product/rate/list', ProductRateControllerForStore::class . '@list');
        });
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/mall/user'], function () {
            $this->router->post('/', UserControllerForUser::class . '@user');
            $this->router->post('card', CardControllerForUser::class . '@card');
            $this->router->post('card/add', CardControllerForUser::class . '@add');
            $this->router->post('card/empty', CardControllerForUser::class . '@empty');
            $this->router->post('card/remove', CardControllerForUser::class . '@remove');
            $this->router->post('coupon', CouponControllerForUser::class . '@coupon');
            $this->router->post('coupon/list', CouponControllerForUser::class . '@list');
            $this->router->post('coupon/remove', CouponControllerForUser::class . '@remove');
            $this->router->post('follow/create', FollowControllerForUser::class . '@create');
            $this->router->post('follow/edit', FollowControllerForUser::class . '@edit');
            $this->router->post('follow/list', FollowControllerForUser::class . '@list');
            $this->router->post('follow/remove', FollowControllerForUser::class . '@remove');
            $this->router->post('footprint/list', OrderControllerForUser::class . '@list');
            $this->router->post('footprint/remove', OrderControllerForUser::class . '@remove');
            $this->router->post('order', OrderControllerForUser::class . '@order');
            $this->router->post('order/cancel', OrderControllerForUser::class . '@cancel');
            $this->router->post('order/edit', OrderControllerForUser::class . '@edit');
            $this->router->post('order/list', OrderControllerForUser::class . '@list');
            $this->router->post('order/remove', OrderControllerForUser::class . '@remove');
            $this->router->post('rate/edit', RateControllerForUser::class . '@edit');
            $this->router->post('rate/list', RateControllerForUser::class . '@list');
            $this->router->post('rate/remove', RateControllerForUser::class . '@remove');
            $this->router->post('vip', VipControllerForUser::class . '@vip');
        });
        $this->router->group(['middleware' => ['web'], 'prefix' => 'mall'], function () {
            $this->router->get('mall*', MallControllerForForeground::class . '@handle');
            $this->router->get('store*', StoreControllerForForeground::class . '@handle');
            $this->router->get('user*', UserControllerForForeground::class . '@handle');
        });
    }
}
