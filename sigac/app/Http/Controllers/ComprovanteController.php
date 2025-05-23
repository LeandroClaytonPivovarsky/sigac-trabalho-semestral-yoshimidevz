<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::with(['aluno', 'documento'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        return view('comprovantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'data_emissao' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id'
        ]);

        $dados = $request->all();
        
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
            $arquivo->move(public_path('uploads/comprovantes'), $nomeArquivo);
            $dados['arquivo'] = 'uploads/comprovantes/' . $nomeArquivo;
        }

        $comprovante = Comprovante::create($dados);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante cadastrado com sucesso!');
    }

    public function show($id)
    {
        $comprovante = Comprovante::with(['aluno', 'documento'])
            ->findOrFail($id);

        return view('comprovantes.show', compact('comprovante'));
    }

    public function edit($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        return view('comprovantes.edit', compact('comprovante'));
    }

    public function update(Request $request, $id)
    {
        $comprovante = Comprovante::findOrFail($id);

        $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'sometimes|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'data_emissao' => 'sometimes|date',
            'aluno_id' => 'sometimes|exists:alunos,id',
            'documento_id' => 'sometimes|exists:documentos,id'
        ]);

        $dados = $request->all();
        
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
            $arquivo->move(public_path('uploads/comprovantes'), $nomeArquivo);
            $dados['arquivo'] = 'uploads/comprovantes/' . $nomeArquivo;
        }

        $comprovante->update($dados);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->delete();

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante excluído com sucesso!');
    }

    public function restore($id)
    {
        $comprovante = Comprovante::withTrashed()->findOrFail($id);
        $comprovante->restore();

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante restaurado com sucesso!');
    }
}
