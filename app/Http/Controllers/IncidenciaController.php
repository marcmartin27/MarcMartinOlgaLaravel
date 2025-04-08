<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidenciaController extends Controller
{    
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'No tens permisos per entrar a la intranet');
        }
        
        $user = Auth::user();
        
        if ($user->departamento === 'informatica') {
            $incidencias = Incidencia::with('user')->get();
        } else {
            $incidencias = Incidencia::where('nick', $user->nick)->get();
        }
        
        return view('incidencias', compact('incidencias'));
    }

    public function create()
    {
        return view('incidencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'tipo' => 'required|in:Hardware,Software',
        ]);
        
        $incidencia = new Incidencia([
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'estado' => 'Pendiente',
            'nick' => Auth::user()->nick
        ]);
        $incidencia->save();
        
        return redirect()->route('incidencias.index');
    }

    public function edit(Incidencia $incidencia)
    {
        if (Auth::user()->departamento !== 'informatica') {
            return redirect()->route('incidencias.index');
        }
        
        return view('incidencias.edit', compact('incidencia'));
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        if (Auth::user()->departamento !== 'informatica') {
            return redirect()->route('incidencias.index');
        }
        
        $request->validate([
            'estado' => 'required|in:Pendiente,En tramite,Solucionada',
        ]);
        
        $incidencia->update([
            'estado' => $request->estado
        ]);
        
        return redirect()->route('incidencias.index');
    }
}