<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Regimpresion;
use App\Models\Tamhoja;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RegimpresionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $regimpresion = Regimpresion::where('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('usuario_id', 'LIKE', "%$keyword%")
                ->orWhere('tamhoja_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $regimpresion = Regimpresion::latest()->paginate($perPage);
        }

        return view('admin.regimpresion.index', compact('regimpresion'));
    }

    public function pdf()
    {
       $regimpresion = Regimpresion::paginate();
       return view('admin.regimpresion.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $hojas = Tamhoja::all();
        return view('admin.regimpresion.create',compact('usuarios','hojas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Regimpresion::create($requestData);

        return redirect('admin/regimpresion')->with('flash_message', 'Regimpresion added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $regimpresion = Regimpresion::findOrFail($id);

        return view('admin.regimpresion.show', compact('regimpresion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $regimpresion = Regimpresion::findOrFail($id);
        $usuarios = Usuario::all();
        $hojas = Tamhoja::all();
        return view('admin.regimpresion.edit', compact('regimpresion','usuarios','hojas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $regimpresion = Regimpresion::findOrFail($id);
        $regimpresion->update($requestData);

        return redirect('admin/regimpresion')->with('flash_message', 'Regimpresion updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Regimpresion::destroy($id);

        return redirect('admin/regimpresion')->with('flash_message', 'Regimpresion deleted!');
    }

}
