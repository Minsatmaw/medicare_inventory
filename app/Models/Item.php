<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Supplier;
use App\Models\Itemcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'itemcategory_id',
        'supplier_id',
    ];

    public function itemcategory(){
        return $this->belongsTo(Itemcategory::class, 'itemcategory_id');
    }


    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }



}
