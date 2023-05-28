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

    public function promocodes()
    {
        return $this->belongsToMany(Promocode::class);
    }


    public function getTotalPrice()
    {
        // $price = 0;
        // $items = $this->items;
        // foreach($items as $item){
        //     $price += ($item->price * $item->quantity);
        // }
        return $this->total;
    }

    public function setTotalPrice()
    {
        $total = 0;
        $items = $this->items;
        foreach($items as $item){
            $total += $item->sub_total;
        }
        $this->total = $total;
        $this->save();
    }

    public function getTotalItems()
    {
        $count = 0;
        foreach($this->items as $item){
            $count += $item->quantity;
        }
        return $count;
    }

    public function getTotalPriceHTML()
    {
        return number_format($this->getTotalPrice(), 0, ',', ' '). " руб";
    }
}
