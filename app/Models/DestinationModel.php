<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    protected $table = 'destinations';

    protected $fillable = ['name', 'country', 'image', 'description'];
}
