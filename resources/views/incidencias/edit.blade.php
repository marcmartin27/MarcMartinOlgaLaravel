<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Estado de Incidencia</title>
</head>
<body>
    <h1>Editar Estado de Incidencia</h1>
    
    <a href="{{ route('incidencias.index') }}">Volver</a>


    <div>
        <p>ID: {{ $incidencia->id }}</p>
        <p>Descripcion: {{ $incidencia->descripcion }}</p>
        <p>Tipo:{{ $incidencia->tipo }}</p>
        <p>Usuario: {{ $incidencia->user->nombre }} {{ $incidencia->user->apellidos }}</p>
        <p>Departamento: {{ $incidencia->user->departamento }}</p>
    </div>

    <form method="POST" action="{{ route('incidencias.update', $incidencia->id) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" required>
                <option value="Pendiente" {{ $incidencia->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En tramite" {{ $incidencia->estado == 'En tramite' ? 'selected' : '' }}>En tramite</option>
                <option value="Solucionada" {{ $incidencia->estado == 'Solucionada' ? 'selected' : '' }}>Solucionada</option>
            </select>
        </div>

        <button type="submit">Actualizar Estado</button>
    </form>
</body>
</html>