<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    public function account()
    {
        return $this->hasOne(Accounts::class,'id','Account_id');
    }

    public function invoiceDetail(){
        return $this->hasOne(InvoiceDetails::class, 'Invoice_id', 'id');
    }

}
