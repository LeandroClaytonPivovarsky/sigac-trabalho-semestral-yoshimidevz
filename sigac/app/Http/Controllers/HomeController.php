<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Documento;

class HomeController extends Controller
{
    /**

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalAlunos = Aluno::count();
        $totalCursos = Curso::count();
        $totalTurmas = Turma::count();
        $totalDocumentos = Documento::count();

        $ultimosAlunos = Aluno::with(['curso'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $ultimosDocumentos = Documento::with(['aluno'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('home', compact(
            'totalAlunos',
            'totalCursos',
            'totalTurmas',
            'totalDocumentos',
            'ultimosAlunos',
            'ultimosDocumentos'
        ));
    }
}
