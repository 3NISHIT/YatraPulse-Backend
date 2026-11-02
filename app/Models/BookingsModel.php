<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingsModel extends Model
{
    protected $table = 'bookings';

    protected $fillable = ['tour_id', 'name', 'phone', 'travel_date', 'tourist'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(ToursModel::class, 'tour_id');
    }
}
