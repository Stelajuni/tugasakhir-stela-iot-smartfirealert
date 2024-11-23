<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlameSensor;

class FlameDataController extends Controller
{
    public function latest_flame() {
        $latestFlameData = FlameSensor::latest()->first();
        return response()->json([
            'nilai_flame' => $latestFlameData ? $latestFlameData->nilai_flame : null,
            'status' => $latestFlameData ? ($latestFlameData->nilai_flame ? 'Kebakaran' : 'Tidak Kebakaran') : 'data tidak tersedia',
            'created_at' => $latestFlameData ? $latestFlameData->created_at->format('d M Y, H:i:s') : null,
        ]);
    }
}
