<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['categoria', 'nivel'])
            ->orderBy('nome')
            ->paginate(10);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'carga_horaria' => 'required|integer|min:1',
            'categoria_id' => 'required|exists:categorias,id',
            'nivel_id' => 'required|exists:niveis,id'
        ]);

        $curso = Curso::create($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso cadastrado com sucesso!');
    }

    public function show($id)
    {
        $curso = Curso::with(['categoria', 'nivel'])
            ->findOrFail($id);

        return view('cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'carga_horaria' => 'sometimes|integer|min:1',
            'categoria_id' => 'sometimes|exists:categorias,id',
            'nivel_id' => 'sometimes|exists:niveis,id'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso excluído com sucesso!');
    }

    public function restore($id)
    {
        $curso = Curso::withTrashed()->findOrFail($id);
        $curso->restore();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso restaurado com sucesso!');
    }
}
