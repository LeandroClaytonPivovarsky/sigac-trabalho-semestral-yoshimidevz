<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with(['aluno', 'categoria'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'data_emissao' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $dados = $request->all();
        
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
            $arquivo->move(public_path('uploads/documentos'), $nomeArquivo);
            $dados['arquivo'] = 'uploads/documentos/' . $nomeArquivo;
        }

        $documento = Documento::create($dados);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show($id)
    {
        $documento = Documento::with(['aluno', 'categoria'])
            ->findOrFail($id);

        return view('documentos.show', compact('documento'));
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);

        $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'arquivo' => 'sometimes|file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'data_emissao' => 'sometimes|date',
            'aluno_id' => 'sometimes|exists:alunos,id',
            'categoria_id' => 'sometimes|exists:categorias,id'
        ]);

        $dados = $request->all();
        
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
            $arquivo->move(public_path('uploads/documentos'), $nomeArquivo);
            $dados['arquivo'] = 'uploads/documentos/' . $nomeArquivo;
        }

        $documento->update($dados);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.index')
            ->with('success', 'Documento excluído com sucesso!');
    }

    public function restore($id)
    {
        $documento = Documento::withTrashed()->findOrFail($id);
        $documento->restore();

        return redirect()->route('documentos.index')
            ->with('success', 'Documento restaurado com sucesso!');
    }
}
