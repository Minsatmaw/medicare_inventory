<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_id',
        'item_id',
        'stock',
        'is_in',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
