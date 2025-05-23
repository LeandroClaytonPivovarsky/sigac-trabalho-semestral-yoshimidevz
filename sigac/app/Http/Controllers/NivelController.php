<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::orderBy('nome')
            ->paginate(10);

        return view('niveis.index', compact('niveis'));
    }

    public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $nivel = Nivel::create($request->all());

        return redirect()->route('niveis.index')
            ->with('success', 'Nível cadastrado com sucesso!');
    }

    public function show($id)
    {
        $nivel = Nivel::findOrFail($id);

        return view('niveis.show', compact('nivel'));
    }

    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('niveis.edit', compact('nivel'));
    }

    public function update(Request $request, $id)
    {
        $nivel = Nivel::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string'
        ]);

        $nivel->update($request->all());

        return redirect()->route('niveis.index')
            ->with('success', 'Nível atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('niveis.index')
            ->with('success', 'Nível excluído com sucesso!');
    }

    public function restore($id)
    {
        $nivel = Nivel::withTrashed()->findOrFail($id);
        $nivel->restore();

        return redirect()->route('niveis.index')
            ->with('success', 'Nível restaurado com sucesso!');
    }
}
