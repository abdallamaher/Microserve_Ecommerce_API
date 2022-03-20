<?php

namespace App\Models;

class Buyer extends User
{


    public function orders()
    {
        return $this->hasMany(Order::Class, 'buyer_id');
    }
}
