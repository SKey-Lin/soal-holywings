<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enum\LoanStatus;

class BookLoan extends Model
{
    protected $casts = [
        'status' => LoanStatus::class,
        'due_date' => 'datetime:Y-m-d',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    protected $fillable = [
        'borrower_name',
        'book_id',
        'status',
        'due_date'
    ];
}
