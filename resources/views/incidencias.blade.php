<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Incidencias</title>
</head>
<body>
    <div class="header">
        <h1>Gestion de Incidencias</h1>
        <p>Benvingut/da usuari: {{ Auth::user()->nombre }} del departament {{ Auth::user()->departamento }}</p>
    </div>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesion</button>
    </form>

    @if(Auth::user()->departamento === 'informatica')
        <h2>Incidencias de todos los departamentos</h2>
    @else
        <h2>Mis incidencias</h2>
        <p><a href="{{ route('incidencias.create') }}">Crear nueva incidencia</a></p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Estado</th>
                @if(Auth::user()->departamento === 'informatica')
                    <th>Usuario</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->id }}</td>
                    <td>{{ $incidencia->descripcion }}</td>
                    <td>{{ $incidencia->tipo }}</td>
                    <td>{{ $incidencia->estado }}</td>
                    @if(Auth::user()->departamento === 'informatica')
                        <td>{{ $incidencia->user->nombre }} {{ $incidencia->user->apellidos }}</td>
                        <td>{{ $incidencia->user->departamento }}</td>
                        <td>
                            <a href="{{ route('incidencias.edit', $incidencia->id) }}">Editar estado</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>