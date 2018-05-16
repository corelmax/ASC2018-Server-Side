<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceModel extends Model
{
    protected $table = 'place_models';
    protected $fillable = ['name', 'latitude', 'longitude', 'x', 'y', 'image_path', 'description'];
}
