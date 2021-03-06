<?php 

namespace App\Models\Product;

/**
 * Class Product
 *
 * @author Anuj Jaha (er.anujjaha@gmail.com)
 */

use App\Models\BaseModel;
use App\Models\Product\Traits\Attribute\Attribute;
use App\Models\Product\Traits\Relationship\Relationship;


class Product extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "data_products";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'category_id',
        'title',
        'color',
        'sku',
        'quantity',
        'price',
        'description',
        'status'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}