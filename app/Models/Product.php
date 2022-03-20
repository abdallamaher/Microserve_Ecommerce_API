<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'seller_id',
        'description',
        'quantity',
        'price',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function seller()
    {
        return $this->belongsTo(User::Class, 'seller_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
