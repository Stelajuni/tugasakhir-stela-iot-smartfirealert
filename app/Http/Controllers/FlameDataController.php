<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlameSensor;

class FlameDataController extends Controller
{
    // public function latest_flame() {
    //     $latestFlameData = FlameSensor::latest()->first();
    //     return response()->json([
    //         'nilai_flame' => $latestFlameData ? $latestFlameData->nilai_flame : null,
    //         'status' => $latestFlameData ? ($latestFlameData->nilai_flame ? 'Kebakaran' : 'Tidak Kebakaran') : 'data tidak tersedia',
    //         'created_at' => $latestFlameData ? $latestFlameData->created_at->format('d M Y, H:i:s') : null,
    //     ]);
    // }

    public function latest_flame() {
        $latestFlameData = FlameSensor::latest()->first(); // Ambil data terbaru dari tabel FlameSensor

        // Jika tidak ada data
        if (!$latestFlameData) {
            return response()->json([
                'nilai_flame' => null,
                'status' => 'data tidak tersedia',
                'created_at' => null
            ]);
        }

        // Menetapkan nilai flame: 1 jika ada kebakaran (nilai_flame > 0), 0 jika tidak ada kebakaran (nilai_flame <= 0)
        $nilai_flame = $latestFlameData->nilai_flame > 0 ? 1 : 0;

        // Menentukan status berdasarkan nilai flame
        $status = $nilai_flame == 1 ? 'Kebakaran' : 'Tidak Kebakaran';

        // Format waktu untuk created_at
        $created_at = $latestFlameData->created_at->format('d M Y, H:i:s');

        return response()->json([
            'nilai_flame' => $nilai_flame,
            'status' => $status,
            'created_at' => $created_at
        ]);
    }

}
