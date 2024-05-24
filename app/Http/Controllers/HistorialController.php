<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\LogHelper;


class HistorialController extends Controller
{
    // Muestra todos los registros de historial
    public function index()
    {
        $historiales = Historial::with('libro')->get();
        return view('historiales.index', compact('historiales'));
    }

    // Muestra el formulario para crear un nuevo historial
    public function create(Request $request)
    {
        $libro_id = $request->input('libro_id');
        $libros = Libro::all();
        return view('historiales.create', compact('libro_id'));
    }

    // Almacena un nuevo historial
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'accion' => 'required|in:agregar,actualizar,eliminar',
            'descripcion' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

        Historial::create($request->all());
        DB::commit();

        return redirect()->route('libros.index')->with('success', 'Historial creado correctamente.');
        } catch (\Exception $e) {
        LogHelper::logError($this, $e);
        DB::rollBack();
        return redirect()->back()->with('msn_error','Fallo la creacion del historial'. $e->getMessage());
        // withErrors(['error' => 'Error al crear el libro: ' . $e->getMessage()])
        }
    }

    // Muestra los detalles de un historial específico
    public function show($id)
    {
        $historial = Historial::with('libro')->findOrFail($id);
        return view('historiales.show', compact('historial'));
    }
}
