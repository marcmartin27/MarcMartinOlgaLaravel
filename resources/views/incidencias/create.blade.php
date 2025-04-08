<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nueva Incidencia</title>
</head>
<body>
    <h1>Crear Nueva Incidencia</h1>
    
    <a href="{{ route('incidencias.index') }}">Volver</a>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('incidencias.store') }}">
        @csrf
        
        <div>
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>
        </div>

        <div>
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="Hardware">Hardware</option>
                <option value="Software">Software</option>
            </select>
        </div>

        <button type="submit">Crear Incidencia</button>
    </form>
</body>
</html>