<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItRecord extends Model
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
