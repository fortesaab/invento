<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
    'customer_id',
    'user_id',
    'invoice_number',
    'invoice_date',
    'total_amount',
    'status',
];
public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function items()
{
    return $this->hasMany(InvoiceItem::class);
}

}
