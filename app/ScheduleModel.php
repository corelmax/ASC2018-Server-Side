<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedule_models';
    protected $fillable = ['type', 'line', 'from_place_id', 'to_place_id', 'departure_time', 'arrival_time', 'distance', 'speed', 'status'];

    function fromPlace() {
        return $this->hasOne(PlaceModel::class, 'id', 'from_place_id');
    }

    function toPlace() {
        return $this->hasOne(PlaceModel::class, 'id', 'to_place_id');
    }
}
