{{-- resources/views/lugares/create.blade.php --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Lugar Turístico</title>
    {{-- Estilos básicos para que se vea un poco mejor --}}
    <style>
        body { font-family: sans-serif; margin: 2em; }
        .form-group { margin-bottom: 1em; }
        label { display: block; margin-bottom: 0.5em; }
        input, textarea { width: 100%; padding: 0.5em; border: 1px solid #ccc; }
        button { padding: 0.7em 1.5em; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Añadir Nuevo Lugar Turístico</h1>

    {{-- El método POST enviará los datos al método store() del controlador --}}
    {{-- La acción apunta a la URL /lugares --}}
    <form action="/lugares" method="POST">
        @csrf {{-- Directiva de seguridad de Laravel OBLIGATORIA --}}

        <div class="form-group">
            <label for="nombre">Nombre del Lugar:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>
        </div>

        <button type="submit">Guardar Lugar Turístico</button>
    </form>

    <br>
    <a href="/lugares">Volver al listado</a>

</body>
</html>