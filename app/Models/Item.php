<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = '15516_items';

    protected $fillable = [
        'name', 'image', 'price', 'desc'
    ];

    public function auction()
    {
        return $this->hasOne(Auction::class, 'item_id', 'id');
    }
}
