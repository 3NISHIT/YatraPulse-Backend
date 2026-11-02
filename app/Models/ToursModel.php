<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ToursModel extends Model
{
    protected $table = 'tours';

    protected $fillable = [
        'destination_id',
        'title',
        'slug',
        'price',
        'duration',
        'description',
        'inclusions',
        'exclusions',
    ];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(DestinationModel::class, 'destination_id');
    }
}
