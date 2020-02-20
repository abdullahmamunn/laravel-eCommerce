<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_name',
        'product_price',
        'product_quantity',
        'product_description',
        'image',
        'publication_status'
    ];
}
