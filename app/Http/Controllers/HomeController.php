<?php

namespace App\Http\Controllers;

use App\Models\Regimpresion;
use App\Models\Tamhoja;
use App\Models\Unisolicitante;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
        $countHojas = Tamhoja::count();
        $countUnidad = Unisolicitante::count();
        $countUsuario = Usuario::count();
        $countRegistro = Regimpresion::count();
        return view('home',compact('countHojas','countUnidad','countUsuario','countRegistro'));
    }


}
