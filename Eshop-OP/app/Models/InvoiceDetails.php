<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(Products::class,'id','Product_id');
    }
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
