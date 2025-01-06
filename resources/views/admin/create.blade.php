@extends('layouts.base')

@section('extra-head')
@stop

@section('page-header')
@stop

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4 pt-3">
        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-outline-secondary w-100 d-flex justify-content-center align-items-center"
           style="max-width: 300px; border-radius: 0.5rem;">
            <i class="fas fa-arrow-left me-2 text-secondary"></i>
            <span class="text-secondary">Regresar</span>
        </a>
    </div>
    <div class="card mx-auto" style="max-width: 600px; padding: 20px; border-radius: 10px;">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tracking_number" class="form-label">Número de Rastreo</label>
                    <input type="text" id="tracking_number" name="tracking_number" class="form-control" readonly>
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Descripción</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="size" class="form-label">Tamaño</label>
                    <select name="size" class="form-select" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="g">G</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="weight" class="form-label">Peso (kg)</label>
                    <input type="text" name="weight" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">Destino</label>
                <input type="text" name="destination" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select name="status" class="form-select" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="sin enviar">Sin Enviar</option>
                    <option value="enviado">Enviado</option>
                    <option value="en camino">En Camino</option>
                    <option value="entregado">Entregado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="recipient_email" class="form-label">Correo del Destinatario</label>
                <input type="email" name="recipient_email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Crear</button>
        </form>
    </div>
    <script src="{{ mix('js/admin/randNumber.js') }}"></script>
@stop
