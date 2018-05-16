<?php

namespace App\Http\Controllers;

use App\ScheduleModel;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    function search(Request $request, $from_place_id, $to_place_id, $departure_time) {
        $departure_time = $departure_time ? $departure_time : date('HH:mm:ss');
        $schedule = ScheduleModel::where('from_place_id', $from_place_id)->where('to_place_id', $to_place_id)->where('departure_time', $departure_time);
    }
}
