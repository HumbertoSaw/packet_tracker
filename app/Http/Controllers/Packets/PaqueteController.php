<?php

namespace App\Http\Controllers\Packets;
use App\Models\Packet;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function packetSearch($packetTN)
    {
        $packet = Packet::where('tracking_number', $packetTN)->first();

        if (!$packet) {
            return response()->json(['error' => 'Paquete no encontrado'], 404);
        }

        return response()->json([
            'id' => $packet->id,
            'tracking_number' => $packet->tracking_number,
            'description' => $packet->description,
            'size' => $packet->size,
            'weight' => $packet->weight,
            'destination' => $packet->destination,
            'status' => $packet->status,
        ]);
    }
}
