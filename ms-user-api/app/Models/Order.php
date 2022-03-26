<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total_price',
        'buyer_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::Class, 'buyer_id');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
