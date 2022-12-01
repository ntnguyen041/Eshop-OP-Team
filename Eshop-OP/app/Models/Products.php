<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categorys::class, 'Category_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'Brand_id','id');
    }
}