<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlameSensor;
use App\Models\MQSensor;

class SensorController extends Controller
{
    // Method untuk menampilkan halaman sensor
    public function sensor()
    {
        return view('pages.sensor'); // Pastikan file ini ada di resources/views/pages/sensor.blade.php
    }

    // Method untuk mengambil data sensor terbaru dalam bentuk JSON
    public function latest_sensors()
    {
        // Ambil data terbaru dari database
        $latestFlameData = FlameSensor::latest()->first();
        $latestMQ5Data = MQSensor::latest()->first();

        return response()->json([
            'flame' => [
                'nilai' => $latestFlameData ? $latestFlameData->nilai_flame : null,
                'keterangan' => $latestFlameData ? ($latestFlameData->nilai_flame > 0 ? 'Kebakaran, Alarm Menyala' : 'Aman, Alarm Mati') : 'Data tidak tersedia',
                'created_at' => $latestFlameData ? $latestFlameData->created_at : null,
            ],
            'mq5' => [
                'nilai' => $latestMQ5Data ? $latestMQ5Data->nilai_gas : null,
                'keterangan' => $latestMQ5Data ? ($latestMQ5Data->nilai_gas > 300 ? 'Gas Berbahaya, Motor Berputar' : 'Aman, Motor Tidak Berputar') : 'Data tidak tersedia',
                'created_at' => $latestMQ5Data ? $latestMQ5Data->created_at : null,
            ]
        ]);
    }
}
