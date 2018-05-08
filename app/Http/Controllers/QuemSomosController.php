<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\quemsomos;
use Illuminate\Http\Request;

class quemsomosController extends Controller
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
            $quemsomos = quemsomos::paginate($perPage);
        } else {
            $quemsomos = quemsomos::paginate($perPage);
        }
    
        $data = array(
           'quemsomos'=>$quemsomos
       );
        return view('admin.quemsomos.index', compact('quemsomos'))->with($data);
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quemsomos.create');
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

        $quemsomos = quemsomos::create($requestData);

        //
        // foreach (explode(",", $request->email) as $key => $value) {
        //     $quemsomos->email()->create([ 'email' => $value, 'quemsomos_id' => $quemsomos->id ]);
        // }
        // foreach (explode(",", $request->telefone) as $key => $value) {
        //     $quemsomos->telefone()->create([ 'telefone' => $value, 'quemsomos_id' => $quemsomos->id ]);
        // }


        // $quemsomos->telefone()->create([ 'telefone' => $telefone, 'quemsomos_id' => $id ]);
        return redirect('admin/quemsomos')->with('flash_message', 'quemsomos added!');
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
        $quemsomos = quemsomos::find($id);


        return view('admin.quemsomos.show', compact('quemsomos'));
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
        $quemsomos = quemsomos::findOrFail($id);

        return view('admin.quemsomos.edit', compact('quemsomos'));
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

        $quemsomos = quemsomos::findOrFail($id);
        $quemsomos->update($requestData);

        return redirect('admin/quemsomos')->with('flash_message', 'quemsomos updated!');
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
        //  quemsomos::destroy($id);
        $quemsomos = quemsomos::find($id);
        $quemsomos->delete();
        //  $request->session()->flash('success', "$nomeUsuario Deletado com sucesso");
        return [response()->json("Sucesso"), redirect('admin/quemsomos')];

        //  $quemsomos->flash('success', 'Registro Excluído com sucesso!');

        //    return redirect()->route('noticia.show', $noticia->id);
    }
}
