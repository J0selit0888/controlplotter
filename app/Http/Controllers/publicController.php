<?php

namespace App\Http\Controllers;

use App\Models\Regimpresion;
use App\Models\Tamhoja;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class publicController extends Controller
{

    public function index()
    {
        $tamhojas = Tamhoja::all();
        return view('welcome', compact('tamhojas'));
    }
    //
    public function verificarUsuario(Request $request)
    {
        // dd($request);
        Request()->validate([
            'ci' => ['required']
        ]);

        $buscarUsuario = Usuario::where('ci', $request->ci)->first();

        if ($buscarUsuario) {
            // dd($buscarUsuario);

            $tamhojas = Tamhoja::all();
            $now = now();
            $fecha = $now->format('d/m/Y');
            return view('welcome', compact('buscarUsuario','tamhojas','fecha'));
        } else {
            echo ("ingrese nuevo usuarios");
        }
    }

    public function validarRegistro(Request $request){
        $request->all();
        return  redirect()->route('index.welcome');
    }

    public function registrarImpresion(Request $request, $id){
        Request()->validate([
            'cantidad' => 'required',
            'hoja' => 'required',
            'descripcion' => 'required',
        ]);
        // // dd($request);
        // dd($id);
        $buscarUsuario = Usuario::find($id);
        $crearRegistro = Regimpresion::create([
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'fecha' => now()->format('Y/m/d'),
            'usuario_id' => $buscarUsuario->id,
            'tamhoja_id' => $request->hoja,
        ]);

        if($crearRegistro){
            return redirect()->route('index.welcome');
        }
    }


}
