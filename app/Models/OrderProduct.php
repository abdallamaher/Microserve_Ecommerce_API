<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * @package App\Models
 */
class OrderProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'order_product';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
