<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MQSensor;

class MQ5DataController extends Controller
{
    public function store(Request $request) {
    $validated = $request->validate([
        'nilai_gas' => 'required|numeric',
    ]);

    $mq = new MQSensor();
    $mq->value = $validated['nilai_gas']; // ganti disini
    $mq->save();

    return response()->json(['message' => 'Data gas berhasil disimpan.'], 201);
    }

    public function latest_mq5(){
    $latestMQ5Data = MQSensor::latest()->first();
    return response()->json([
        'nilai_gas' => $latestMQ5Data ? $latestMQ5Data->value : null,
        'created_at' => $latestMQ5Data ? $latestMQ5Data->created_at : null,
    ]);
}


}
