<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItinerariesModel extends Model
{
    protected $table = 'itineraries';

    protected $fillable = [
        'tour_id',
        'day_number',
        'title',
        'description',
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(ToursModel::class, 'tour_id');
    }
}
