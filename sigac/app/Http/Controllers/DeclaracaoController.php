<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        return view('declaracoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'conteudo' => 'required|string',
            'data_emissao' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $declaracao = Declaracao::create($request->all());

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração cadastrada com sucesso!');
    }

    public function show($id)
    {
        $declaracao = Declaracao::with(['aluno'])
            ->findOrFail($id);

        return view('declaracoes.show', compact('declaracao'));
    }

    public function edit($id)
    {
        $declaracao = Declaracao::findOrFail($id);
        return view('declaracoes.edit', compact('declaracao'));
    }

    public function update(Request $request, $id)
    {
        $declaracao = Declaracao::findOrFail($id);

        $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'conteudo' => 'sometimes|string',
            'data_emissao' => 'sometimes|date',
            'aluno_id' => 'sometimes|exists:alunos,id'
        ]);

        $declaracao->update($request->all());

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $declaracao->delete();

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração excluída com sucesso!');
    }

    public function restore($id)
    {
        $declaracao = Declaracao::withTrashed()->findOrFail($id);
        $declaracao->restore();

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração restaurada com sucesso!');
    }
}
