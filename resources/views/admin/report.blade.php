<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Diario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Reporte Diario</h2>
<p>Fecha: {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}</p>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Número de Rastreo</th>
        <th>Descripción</th>
        <th>Tamaño</th>
        <th>Peso</th>
        <th>Destino</th>
        <th>Estado</th>
        <th>Fecha Creación</th>
        <th>Última Modificación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($todayPackets as $packets)
        <tr>
            <td>{{ $packets->id }}</td>
            <td>{{ $packets->tracking_number }}</td>
            <td>{{ $packets->description }}</td>
            <td>{{ $packets->size }}</td>
            <td>{{ $packets->weight }}</td>
            <td>{{ $packets->destination }}</td>
            <td>{{ $packets->status }}</td>
            <td>{{ $packets->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $packets->updated_at->format('Y-m-d H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
