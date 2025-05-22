<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller{
    function emitirRelatorio(){
        $dompdf = new Dompdf();
        $dompdf -> loadHtml('Hello World');
        $dompdf -> setPaper('A4', 'landscape');
        $dompdf -> render();
        $dompdf -> stream();
    }
}