<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with(['curso', 'turma', 'user'])
            ->orderBy('nome')
            ->paginate(10);

        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'cpf' => 'required|string|size:11|unique:alunos',
            'email' => 'required|email|unique:alunos',
            'senha' => 'required|string|min:6',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $dados = $request->all();
        $dados['senha'] = Hash::make($request->senha);

        $aluno = Aluno::create($dados);

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show($id)
    {
        $aluno = Aluno::with(['curso', 'turma', 'user'])
            ->findOrFail($id);

        return view('alunos.show', compact('aluno'));
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:150',
            'cpf' => 'sometimes|string|size:11|unique:alunos,cpf,' . $aluno->id,
            'email' => 'sometimes|email|unique:alunos,email,' . $aluno->id,
            'senha' => 'sometimes|string|min:6',
            'curso_id' => 'sometimes|exists:cursos,id',
            'turma_id' => 'sometimes|exists:turmas,id',
            'user_id' => 'sometimes|exists:users,id'
        ]);

        $dados = $request->all();
        if ($request->has('senha')) {
            $dados['senha'] = Hash::make($request->senha);
        }

        $aluno->update($dados);

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno excluído com sucesso!');
    }

    public function restore($id)
    {
        $aluno = Aluno::withTrashed()->findOrFail($id);
        $aluno->restore();

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno restaurado com sucesso!');
    }
}
