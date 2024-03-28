<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{

    protected $fillable = [
        'name',
        'count',
        'category_id',
        'summary'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }
}
