@extends('layouts.base')

@section('extra-head')
@stop

@section('page-header')
@stop

@section('content')
    <div class="d-flex justify-content-end align-items-end pt-3 px-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Admin Dashboard</a>
    </div>
    <div class="container mt-5 pb-3">
        <p class="text-center mb-4">Rastrea tu paquete</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form-search">
                    <div class="input-group">
                        <input type="text" name="tracking_number" id="tracking_number" class="form-control"
                               placeholder="Ingresa el número de rastreo (8 dígitos)" maxlength="8" required>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                    <small class="text-danger d-none" id="error-message">El número de rastreo debe ser de 8 dígitos.</small>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div id="result-search" class="border rounded p-4 bg-light d-none">
                    <p><strong>ID:</strong> <span id="result-id"></span></p>
                    <p><strong>Número de rastreo:</strong> <span id="result-tracking-number"></span></p>
                    <p><strong>Descripción:</strong> <span id="result-description"></span></p>
                    <p><strong>Tamaño:</strong> <span id="result-size"></span></p>
                    <p><strong>Peso:</strong> <span id="result-weight"></span> Kg</p>
                    <p><strong>Destino:</strong> <span id="result-destination"></span></p>
                    <p><strong>Estatus:</strong> <span id="result-status"></span></p>
                    <p><strong>Email receptor:</strong> <span id="result-recipient_email"></span></p>
                </div>

                <div id="result-search-na" class="border rounded p-4 bg-light d-none">
                    <h4>Resultado de la búsqueda</h4>
                    <p><strong>PAQUETE NO ENCONTRADO.</strong></p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/packets/packet_search.js') }}"></script>
@stop
