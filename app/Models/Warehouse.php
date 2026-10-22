<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Warehouse extends Model
{
    use HasFactory;


protected $fillable = [
        'location',
        'supplier_id',
    ];

public function manager(): HasOne
{
    return $this->hasOne(Manager::class);
}
}
