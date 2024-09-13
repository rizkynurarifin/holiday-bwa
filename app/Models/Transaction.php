<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'trx_id',
        'quantity',
        'holiday_date',
        'total_amount',
        'is_paid',
        'proof',
        'user_id',
        'holiday_package_id',
    ];

    protected $casts = [
        'total_amount' => MoneyCast::class,
        'holiday_at' => 'date',
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'TRX';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('trx_id', $randomString)->exists());

        return $randomString;
    } 

    public function holidayPackage(): BelongsTo
    {
        return $this->belongsTo(HolidayPackage::class, 'holiday_package_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
