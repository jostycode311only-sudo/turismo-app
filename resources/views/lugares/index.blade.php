<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBMAPS-lugares turisticos</title>
 <style>
        
.navegacion {
            background-color: #333;
            overflow: hidden;
}
.navegacion a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
}
.navegacion a:hover {
            background-color: #575757;
}
    
    /* Estilos para el nuevo contenedor de lugares */
.lugares-contenedor {
    display: flex; /* Convierte el contenedor en un Flexbox */
    flex-wrap: wrap; /* Permite que los elementos se envuelvan a la siguiente línea si no caben */
    justify-content: center; /* Centra los elementos horizontalmente */
    gap: 20px; /* Espacio entre los elementos */
    padding: 20px;
}

.lugar-turistico {
        /* Mantiene la imagen y la info lado a lado dentro de la tarjeta */
    display: flex;
    flex-direction: column; /* Organiza el contenido en columna: imagen arriba, texto abajo */
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    width: calc(50% - 20px); /* 2 columnas en pantallas grandes */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Agrega una sombra para un efecto de tarjeta */
}

.imagen-contenedor img {
    width: 100%;
    height: auto;
    display: block;
}

    /* Puedes agregar estilos adicionales para el texto si lo necesitas */
.info-contenedor {
    padding: 15px;
    text-align: center;
}

    /* Estilos para hacer el diseño responsive */
@media (max-width: 768px) {
    .lugar-turistico {
    width: 100%; /* Una sola columna en dispositivos más pequeños */
    }
}

</style>
</head>
<header>
    <h1>Bienvenido a Lugares Turísticos</h1>
    <h2>¿Qué te gustaría visitar o explorar el día de hoy?</h2>
    <h2>En Puerto Boyacá tenemos multiples lugares para explorar y pasar el rato. </h2>
    <nav class="navegacion">
    <a href="{{ url('/') }}">Inicio</a>
    <a href="{{ url('/lugares') }}">Lugares Turísticos</a>
    <a href="{{ url('/eventos') }}">Eventos</a>
    <a href="{{ url('/hoteles') }}">Hoteles</a>
    <a href="#">¿Por qué se creo PB-MAPS?</a>
    </nav>
</header>
<body>
    {{-- Bloque para mostrar mensajes de éxito --}}
    @if (session('success'))
        <div style="padding: 1em; margin-bottom: 1em; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Contenedor principal para aplicar el Flexbox --}}
    <div class="lugares-contenedor">

        {{-- Bucle de Blade que recorrerá cada lugar turístico --}}
        @forelse ($lugares as $lugar)
            <div class="lugar-turistico">
                <div class="imagen-contenedor">
                    <img src="https://via.placeholder.com/400x250.png?text=Lugar+Turistico" alt="Imagen de {{ $lugar->nombre }}">
                </div>
                <div class="info-contenedor">
                    <h2>{{ $lugar->nombre }}</h2>
                    <p>{{ $lugar->descripcion }}</p>
                    <p><strong>Ubicación:</strong> {{ $lugar->ubicacion }}</p>

                    <a href="#">Ver detalles</a>

                    {{-- Solo muestra los botones de acción si el usuario es admin --}}
                    {{-- =================== AÑADE ESTE BLOQUE DE CÓDIGO AQUÍ =================== --}}
                    @if(auth()->check() && auth()->user()->role === 'admin')
                       <div style="margin-top: 10px;">
                           <a href="{{ route('lugares.edit', $lugar->id) }}" style="padding: 5px 10px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 3px;">
                               Editar
                           </a>
                           {{-- Aquí pondremos el botón de eliminar más adelante --}}
                       </div>
                   @endif
    {{-- =================== FIN DEL BLOQUE A AÑADIR =================== --}}
                </div>
            </div>
        @empty
            <div>
                <h2>No hay lugares turísticos para mostrar todavía.</h2>
                <p>¡Intenta añadir uno nuevo!</p>
            </div>
        @endforelse

    </div>

    {{-- El botón de "Añadir" que ya tenías está perfecto aquí --}}
    @if(auth()->check() && auth()->user()->role === 'admin')
    <div style="text-align: center; padding: 20px;">
        <a href="{{ url('/lugares/create') }}" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
            + Añadir Nuevo Lugar Turístico
        </a>
    </div>
    @endif

</body>
</html>