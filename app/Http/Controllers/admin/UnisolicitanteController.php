<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Unisolicitante;
use Illuminate\Http\Request;

class UnisolicitanteController extends Controller
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
            $unisolicitante = Unisolicitante::where('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $unisolicitante = Unisolicitante::latest()->paginate($perPage);
        }

        return view('admin.unisolicitante.index', compact('unisolicitante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.unisolicitante.create');
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
        
        Unisolicitante::create($requestData);

        return redirect('admin/unisolicitante')->with('flash_message', 'Unisolicitante added!');
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
        $unisolicitante = Unisolicitante::findOrFail($id);

        return view('admin.unisolicitante.show', compact('unisolicitante'));
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
        $unisolicitante = Unisolicitante::findOrFail($id);

        return view('admin.unisolicitante.edit', compact('unisolicitante'));
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
        
        $unisolicitante = Unisolicitante::findOrFail($id);
        $unisolicitante->update($requestData);

        return redirect('admin/unisolicitante')->with('flash_message', 'Unisolicitante updated!');
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
            Unisolicitante::destroy($id);
            return redirect('admin/unisolicitante')->with('flash_message', 'Unisolicitante deleted!');
        } catch (\Exception $e) {
            return redirect('admin/unisolicitante')->with('error', 'Error deleting Unisolicitante: ' . $e->getMessage());
        }
        
    }
}
