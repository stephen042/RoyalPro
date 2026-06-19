<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pin',
        'is_active',
        'card_details',
        'paid_price',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'paid_price' => 'decimal:2',
        'card_details' => 'array', // Automatically encodes/decodes JSON to PHP array
    ];

    /**
     * Get the user that owns the virtual card.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
