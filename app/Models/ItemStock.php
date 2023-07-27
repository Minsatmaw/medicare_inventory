<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'person_id',
        'item_id',
        'stock',
        'is_in',
        'description',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
