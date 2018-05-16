<?php

namespace App\Http\Controllers;

use App\PlaceModel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{

    function all() {
        $places = PlaceModel::all();

        return response($places, 200);
    }

    function find(Request $request, $id) {
        $place = PlaceModel::where('id', $id)->first();
        return response($place, 200);
    }

    function create(Request $request) {
        try {
            $image_path = $request->file('image')->storePublicly('places');
            $data = $request->post();
            $place = new PlaceModel($data);
            $place->image_path = $image_path;
            $place->save();

            return response([
                'message' => 'create success'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'message' => 'Data cannot be processed'
            ], 422);
        }
    }

    function delete(Request $request, $id) {
        $place = PlaceModel::where('id', $id)->first();
        if($place === null) {
            return response([
                'message' => 'Data cannot be deleted'
            ], 400);
        }

        $place->delete();
        return response([
            'message' => 'delete success'
        ], 200);
    }

    function update(Request $request, $id) {
        try {
            $data = $request->post();
            $place = PlaceModel::where('id', $id)->first();

            $file = $request->file('image');
            if($file !== null) {
                $data['image_path'] = $file->storePublicly('places');
            }
            $place->update($data);
            $place->save();

            return response([
                'message' => 'update success'
            ], 200);
        } catch (\Exception $e) {
            return response([
                'message' => 'Data cannot be updated'
            ], 400);
        }
    }
}
