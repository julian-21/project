<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'sale_date',
        'quantity',
        'unit_price',
        'total_price',
        'customer_name',
        'invoice_number',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sale_date' => 'date',
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * Get the product that owns the sale.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeDateRange(Builder $query, ?string $startDate, ?string $endDate): Builder
    {
        if ($startDate) {
            $query->where('sale_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('sale_date', '<=', $endDate);
        }

        return $query;
    }

    /**
     * Get formatted total price.
     */
    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-calculate total_price before creating
        static::creating(function ($sale) {
            if (!$sale->total_price) {
                $sale->total_price = $sale->quantity * $sale->unit_price;
            }
        });
    }
}