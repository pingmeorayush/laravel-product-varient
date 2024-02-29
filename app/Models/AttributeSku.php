<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeSku extends Pivot
{

    protected $fillable = [
        'attribute_id',
        'sku_id',
        'value',
    ];

    protected $table = 'attribute_sku';

    public function sku(): BelongsTo
    {
        return $this->belongsTo(Sku::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
