<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campanha;
use App\Models\Cidade;
use App\Models\Desconto;
use App\Models\Grupo;
use App\Models\Produto;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campanha = Campanha::all();
        $desconto = Desconto::all();
        $grupo = Grupo::with('cidade')->get();
        $produto = Produto::all();

            return view('home', compact('campanha', 'desconto', 'grupo', 'produto'));
    }
}
