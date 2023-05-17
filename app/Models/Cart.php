<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'user_id', 'total'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalPrice()
    {
        $price = 0;
        $items = $this->items;
        foreach($items as $item){
            $price += ($item->price * $item->quantity);
        }
        return $price;
    }

    public function getTotalPriceHTML()
    {
        return number_format($this->getTotalPrice(), 0, ',', ' '). " руб";
    }
}
