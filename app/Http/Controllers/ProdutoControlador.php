<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = ["Televisão 40", "NoTebook Acer", "Impressora HP", "HD Externo"];

    public function __constructor()
    {
        $this->middleware('produto');
    }
    public function index()
    {
       echo "<h3>Listagem de Produtos</h3>";
         echo "<ol>";
            foreach ($this->produtos as $produto) {
                echo "<li>$produto</li>";
            }
         echo "</ol>";
    }
}
