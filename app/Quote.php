<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['quote_number', 'quote_date', 'customer_id', 'tax_percent'];

    public function customer(){

        return $this->belongsTo(Customer::class);
    }

    public function quote_items(){

        return $this->hasMany(QuotesItem::class);
    }

    public function  getTotalAmountAttribute(){

        $total_amount = 0;
        foreach ($this->quote_items as $item) {
            $total_amount += $item->price * $item->quantity;
        }
        return $total_amount;

        }


}
