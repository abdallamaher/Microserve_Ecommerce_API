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
        'description',
        'image',
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


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
