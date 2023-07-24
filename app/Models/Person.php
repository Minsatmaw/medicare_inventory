<?php

namespace App\Models;

use App\Models\ItRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function items(){
        return $this->hasMany(ItRecord::class);
    }
}
