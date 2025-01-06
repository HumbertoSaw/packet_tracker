<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PacketUpdated;
use App\Models\Packet;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $paquetes = Packet::all();
        return view('admin.dashboard', compact('paquetes'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|digits:8|unique:packets',
            'description' => 'required',
            'size' => 'required',
            'weight' => 'required',
            'destination' => 'required',
            'status' => 'required',
            'recipient_email' => 'required',
        ]);

        $packet = Packet::create($request->all());

        if ($packet->recipient_email) {
            Mail::to($packet->recipient_email)->send(new PacketUpdated($packet));
        }
        
        return redirect()->route('admin.dashboard')->with('success', 'Paquete creado exitosamente');
    }

    public function edit($id)
    {
        $paquete = Packet::findOrFail($id);
        return view('admin.edit', compact('paquete'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'size' => 'required',
            'weight' => 'required',
            'destination' => 'required',
            'status' => 'required',
            'recipient_email' => 'required',
        ]);

        $paquete = Packet::findOrFail($id);
        $paquete->update($request->all());

        if ($paquete->recipient_email) {
            Mail::to($paquete->recipient_email)->send(new PacketUpdated($paquete));
        }

        return redirect()->route('admin.dashboard')->with('success', 'Paquete actualizado exitosamente');
    }

    public function delete($id)
    {
        $paquete = Packet::findOrFail($id);
        $paquete->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Paquete eliminado exitosamente');
    }

    public function dailyReport()
    {
        $hoy = Carbon::today();
        $todayPackets = Packet::whereDate('created_at', $hoy)
            ->orWhereDate('updated_at', $hoy)
            ->get();

        $pdf = Pdf::loadView('admin.report', compact('todayPackets'));

        return $pdf->download('reporte_diario_' . $hoy->format('Y-m-d') . '.pdf');
    }
}
