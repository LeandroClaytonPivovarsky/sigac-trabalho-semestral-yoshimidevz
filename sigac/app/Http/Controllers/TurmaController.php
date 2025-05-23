<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with(['curso'])
            ->orderBy('nome')
            ->paginate(10);

        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $turma = Turma::create($request->all());

        return redirect()->route('turmas.index')
            ->with('success', 'Turma cadastrada com sucesso!');
    }

    public function show($id)
    {
        $turma = Turma::with(['curso'])
            ->findOrFail($id);

        return view('turmas.show', compact('turma'));
    }

    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'curso_id' => 'sometimes|exists:cursos,id'
        ]);

        $turma->update($request->all());

        return redirect()->route('turmas.index')
            ->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')
            ->with('success', 'Turma excluída com sucesso!');
    }

    public function restore($id)
    {
        $turma = Turma::withTrashed()->findOrFail($id);
        $turma->restore();

        return redirect()->route('turmas.index')
            ->with('success', 'Turma restaurada com sucesso!');
    }
}
