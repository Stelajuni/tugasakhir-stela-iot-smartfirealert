<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlameSensor;

class FlameDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nilai_flame_sensors' => 'required|boolean',
        ]);

        $data = FlameSensor::create([
        'name' => $request->name??"sensor-api-1",
        'nilai_flame_sensors' => $request->nilai_flame_sensors,
        ]);
;

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function latest_flame()
    {
        $latestFlameData = FlameSensor::latest()->first();

        return response()->json([
            'nilai_flame_sensors' => $latestFlameData?->nilai_flame_sensors,
            'status' => $latestFlameData
                ? ($latestFlameData->nilai_flame_sensors ? 'Kebakaran, Alarm Nyala' : 'Tidak Kebakaran')
                : 'Data tidak tersedia',
            'created_at' => $latestFlameData?->created_at?->format('d M Y, H:i:s'),
        ]);
    }
}
