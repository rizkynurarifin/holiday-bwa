<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DestinationPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'holiday_package_id',
        'destination_id',
    ];

    public function holidayPackage(): BelongsTo
    {
        return $this->belongsTo(HolidayPackage::class, 'holiday_package_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
