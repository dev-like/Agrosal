<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Informacaonutricional;
use App\Models\Produto;
use Illuminate\Http\Request;
use DB;
use Image;
use Storage;

class InformacaonutricionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($produto)
    {
        $informacaonutricionais = informacaonutricional::paginate(500)->where('produtos_id', $produto);
        return view('admin.informacaonutricional.index', [
          'informacaonutricional' => $informacaonutricionais,
          'produto' => $produto
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $informacaonutricionais  = informacaonutricional::all();
        $produtos = Produto::all();

        return view('admin.informacaonutricional.create', ['informacaonutricional' => $informacaonutricionais], ['produtos' => $produtos]);
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
        $informacaonutricionais = informacaonutricional::create($requestData);

        return redirect('admin/informacaonutricional/'.$informacaonutricionais->produtos_id)->with('flash_message', 'informacaonutricional added!');
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
        $informacaonutricionais = informacaonutricional::find($id);

        return view('admin.informacaonutricional.show')->with('informacaonutricional', $informacaonutricionais);
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
        $informacaonutricional = informacaonutricional::find($id);
        $produtos = Produto::all();

        return view('admin.informacaonutricional.edit', [
          'informacaonutricional' => $informacaonutricional
      ]);
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
        $informacaonutricional = informacaonutricional::find($id);


        $informacaonutricional->save();
        $request->session()->flash('success', 'informacaonutricional alterada com sucesso');
        return redirect()->route('informacaonutricional.index');
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
        $informacaonutricional = informacaonutricional::find($id);
        $informacaonutricional->delete();
        return [response()->json("success"), redirect('admin/informacaonutricional')];
    }
}
