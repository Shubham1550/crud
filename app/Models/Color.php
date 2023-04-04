<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    // public function product()
    // {
    //     return $this->hasMany(Product::class,'id','product_id');
    // }

    // public function user()
    // {
    //     return $this->hasMany(User::class,'id','user_id');
    // }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
