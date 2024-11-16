<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MQSensor;

class MQ5DataController extends Controller
{
    // public function latest_mq5(){
    //     $latestMQ5Data = MQSensor::latest()->first();
    //     return response()->json([
    //         'nilai_gas' => $latestMQ5Data ? $latestMQ5Data->nilai_gas : null,
    //         'created_at' => $latestMQ5Data ? $latestMQ5Data->created_at : null,
    //     ]);
    // }

    public function latest_mq5() {
        $latestMQ5Data = MQSensor::orderBy('id', 'desc')->first();

        if (!$latestMQ5Data) {
            return response()->json([
                'error' => 'No data available in MQSensor table',
            ]);
        }

        // Ambil nilai_gas, pastikan decimal
        $nilai_gas = $latestMQ5Data->nilai_gas !== null
            ? round((float) $latestMQ5Data->nilai_gas, 2)
            : 0.00;

        return response()->json([
            'nilai_gas' => $nilai_gas,
            'created_at' => $latestMQ5Data->created_at,
        ]);
    }


}
