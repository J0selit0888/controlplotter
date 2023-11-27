<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Tamhoja;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;


class TamhojaController extends Controller
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
            $tamhoja = Tamhoja::where('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tamhoja = Tamhoja::latest()->paginate($perPage);
        }

        return view('admin.tamhoja.index', compact('tamhoja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tamhoja.create');
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
        
        Tamhoja::create($requestData);

        return redirect('admin/tamhoja')->with('flash_message', 'Tamhoja added!');
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
        $tamhoja = Tamhoja::findOrFail($id);

        return view('admin.tamhoja.show', compact('tamhoja'));
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
        $tamhoja = Tamhoja::findOrFail($id);

        return view('admin.tamhoja.edit', compact('tamhoja'));
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
        
        $tamhoja = Tamhoja::findOrFail($id);
        $tamhoja->update($requestData);

        return redirect('admin/tamhoja')->with('flash_message', 'Tamhoja updated!');
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
          try {
            Tamhoja::destroy($id);
            return redirect('admin/tamhoja')->with('flash_message', 'Tamhoja deleted!');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                // Código de error 23000: Error de integridad de restricción de clave externa
                $mensaje = "No puedes eliminar esta Tamhoja debido a restricciones de integridad.";
                return redirect('admin/tamhoja')->with('error', $mensaje);
            } else {
                // Otro tipo de error
                return redirect('admin/tamhoja')->with('error', 'Ocurrió un error al eliminar la Tamhoja.');
            }
        }
        
       
    }
    
}
