<?php

namespace Notadd\Shop\Models;

/*
 * Antvel - Products Offers Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Eloquent\Model;

class ProductOffer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_product_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'day_start',
        'day_end',
        'percentage',
        'price',
        'quantity',
    ];
}
