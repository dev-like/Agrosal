<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Email;
use App\Models\Telefone;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
            $cliente = Cliente::paginate($perPage);
        } else {
            $cliente = Cliente::paginate($perPage);
        }
        $cliente = Cliente::with(['primeirotelefone' => function($query) {

           $query->latest()->first();

       }])->get();


       $data = array(
           'cliente'=>$cliente
       );
        return view('admin.cliente.index',compact('cliente'))->with($data);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cliente.create');
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

        $cliente = Cliente::create($requestData);


        foreach (explode(",",$request->email) as $key => $value)
            $cliente->email()->create([ 'email' => $value, 'cliente_id' => $cliente->id ]);
        foreach (explode(",",$request->telefone) as $key => $value)
            $cliente->telefone()->create([ 'telefone' => $value, 'cliente_id' => $cliente->id ]);


        // $cliente->telefone()->create([ 'telefone' => $telefone, 'cliente_id' => $id ]);
        return redirect('admin/cliente')->with('flash_message', 'Cliente added!');
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
        $cliente = Cliente::find($id);


        return view('admin.cliente.show', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);

        return view('admin.cliente.edit', compact('cliente'));
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

        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        return redirect('admin/cliente')->with('flash_message', 'Cliente updated!');
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
      //  Cliente::destroy($id);
      $cliente = Cliente::find($id);
      $cliente->delete();
    //  $request->session()->flash('success', "$nomeUsuario Deletado com sucesso");
       return [response()->json("Sucesso"), redirect('admin/cliente')];

          //  $cliente->flash('success', 'Registro Excluído com sucesso!');

        //    return redirect()->route('noticia.show', $noticia->id);

    }
}
