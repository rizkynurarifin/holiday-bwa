<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HolidayPackagePhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'holiday_package_id',
        'photo',
    ];

    public function holidayPackage(): BelongsTo
    {
        return $this->belongsTo(HolidayPackage::class, 'holiday_package_id');
    }
}
