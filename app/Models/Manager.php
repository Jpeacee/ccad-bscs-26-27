<?php

namespace App\Models;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    use HasFactory;
protected $fillable = [
        'manager_name',
        'warehouse_id',
    ];
public function warehouse(): BelongsTo
{
    return $this->belongsTo(Warehouse::class);
}
}
