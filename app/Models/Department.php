<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
    ];



    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

}
