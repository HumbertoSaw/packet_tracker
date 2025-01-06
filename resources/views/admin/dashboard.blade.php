@extends('layouts.base')

@section('extra-head')
@stop

@section('page-header')
@stop

@section('content')
    <div class="d-flex justify-content-end align-items-end p-3">
        <a href="{{ route('admin.create') }}" class="btn btn-success">Enviar Paquete</a>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-4 pt-3">
        <a href="/"
           class="btn btn-outline-secondary w-100 d-flex justify-content-center align-items-center"
           style="max-width: 300px; border-radius: 0.5rem;">
            <i class="fas fa-arrow-left me-2 text-secondary"></i>
            <span class="text-secondary">Salir de vista administrador</span>
        </a>
    </div>
    <div class="container mt-5">
        <a href="{{ route('admin.daily-report') }}" class="btn btn-primary">Generar Reporte Diario</a>
        <br><br>
        <div class="table-responsive"> <!-- Contenedor para scroll horizontal -->
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Rastreo</th>
                    <th>Descripción</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paquetes as $paquete)
                    <tr>
                        <td>{{ $paquete->id }}</td>
                        <td>{{ $paquete->tracking_number }}</td>
                        <td>{{ $paquete->description }}</td>
                        <td>{{ $paquete->size }}</td>
                        <td>{{ $paquete->weight }}</td>
                        <td>{{ $paquete->destination }}</td>
                        <td>{{ $paquete->status }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $paquete->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.delete', $paquete->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
