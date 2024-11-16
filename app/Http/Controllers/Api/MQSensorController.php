<?php

namespace App\Http\Controllers\Api;

use App\Models\MQSensor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MQSensorController extends Controller
{
    function index()
    {
        $sensorsData = MQSensor::orderBy('created_at', 'desc')
        -> limit(20)
        -> get();

        return response()->json($sensorsData, 200);
    }

    function show($id)
    {
        $sensorData = MQSensor::find($id);

        if ($sensorData) {
            return response()
                ->json($sensorData, 200);
        } else {
            return response()
                ->json(['message' => 'Data not found'], 404);
        }
    }

    function store(Request $request)
    {
        $request->validate([
            'value' => [
                'required',
                'numeric',
            ]
        ]);

            $sensorData = MQSensor::create($request->all());

            return response()
                ->json($sensorData, 201);
    }
}
