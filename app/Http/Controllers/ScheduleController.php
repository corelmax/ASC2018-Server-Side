<?php

namespace App\Http\Controllers;

use App\ScheduleModel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    function create(Request $request) {

        $schedule = new ScheduleModel($request->post());
        $schedule->save();

        return response([
            'message' => 'create success'
        ], 200);
    }

    function delete(Request $request, $id) {
        try {
            $schedule = ScheduleModel::where('id', $id)->first();
            $schedule->delete();

            return response([
                'message' => 'delete success'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'message' => 'Data cannot be deleted'
            ], 400);
        }
    }
}
