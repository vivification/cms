<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotesItem extends Model
{
    protected $fillable = ['quote_id', 'product_id', 'name', 'quantity', 'price'];
}
