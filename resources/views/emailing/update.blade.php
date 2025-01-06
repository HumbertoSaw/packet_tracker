<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización del Paquete</title>
</head>
<body>
<p><strong>ID:</strong> {{ $packet->id }}</p>
<p><strong>Número de Rastreo:</strong> {{ $packet->tracking_number }}</p>
<p><strong>Descripción:</strong> {{ $packet->description }}</p>
<p><strong>Estado:</strong> {{ $packet->status }}</p>
<p><strong>Destino:</strong> {{ $packet->destination }}</p>
</body>
</html>
