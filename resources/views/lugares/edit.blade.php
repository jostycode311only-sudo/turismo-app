<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Lugar Turístico</title>
    {{-- Puedes añadir los mismos estilos del create.blade.php si quieres --}}
</head>
<body>

    <h1>Editar Lugar Turístico: {{ $lugar->nombre }}</h1>

    {{-- Este formulario enviará los datos al método update() del controlador --}}
    <form action="{{ route('lugares.update', $lugar->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- ¡Importante! Indica a Laravel que es una actualización --}}

        <div>
            <label for="nombre">Nombre del Lugar:</label>
            {{-- El atributo 'value' rellena el campo con el dato actual --}}
            <input type="text" id="nombre" name="nombre" value="{{ $lugar->nombre }}" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            {{-- En un textarea, el valor se pone entre las etiquetas --}}
            <textarea id="descripcion" name="descripcion" rows="4" required>{{ $lugar->descripcion }}</textarea>
        </div>

        <div>
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="{{ $lugar->ubicacion }}" required>
        </div>

        <button type="submit">Actualizar Lugar</button>
    </form>

    <br>
    <a href="{{ url('/lugares') }}">Cancelar y volver al listado</a>

</body>
</html>