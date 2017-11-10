<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $product_id
 * @property string $product_name
 * @property string $product_total_quantity
 * @property string $product_sku
 * @property string $price
 * @property string $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProductTotalQuantity($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_total_quantity',
        'product_sku',
        'price',
        'category_id',
    ];
}
