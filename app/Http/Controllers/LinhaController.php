<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Linha;
use Illuminate\Http\Request;
use DB;
use Image;
use Storage;

class LinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $linha = Linha::paginate(15);
        return view('admin.linhas.index', [
          'linha' => $linha
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.linhas.create');
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
        $this->validate($request, array(
          'nome'          => 'required|max:225|unique:linhas,nome,NULL, deleted_at,deleted_at,NULL',
          'capa'          => 'image|mimes:jpeg,png,jpg',
    ));

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->nome));

        $linha = new Linha;
        $linha->nome          = $request->nome;
        $linha->descricao     = $request->descricao;
        $linha->slug            = $slug;

        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('linhas/imagens/' . $filename);
            Image::make($image)->resize(378, 476)->save($location);
            $linha->capa = $filename;
        }

        $linha->save();
        $request->session()->flash('success', 'Linha adicionada com sucesso');
        return redirect()->route('linha.index');
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
        $linha = linha::where('slug', '=', $id)->first();
        return view('admin.linhas.show')->with('linha', $linha);
    }

    public function tirarAcentos($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"), explode(" ", "a A e E i I o O u U n N C c"), $string);
    }

    public function getSingle($slug)
    {
        $linha = linha::where('slug', '=', $slug)->first();
        return view('admin.linhas.show')->with('linha', $linha);
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
        $linha = Linha::find($id);
        return view('admin.linhas.edit', [
          'linha' => $linha
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
        $linha = Linha::find($id);

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->nome));

        $linha->fill($request->all());
        $linha->slug          = $slug;
        $linha->descricao     = $request->descricao;


        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('linhas/imagens/' . $filename);
            Image::make($image)->resize(378, 476)->save($location);

            if ($linha->capa) {
                $oldFilename = $linha->capa;
                Storage::delete('noticias/imagens/'.$oldFilename);
            }
            $linha->capa = $filename;
        }

        $linha->save();
        $request->session()->flash('success', 'Linha alterada com sucesso');
        return redirect()->route('linha.index');
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
        $linha = linha::find($id);
        $linha->delete();
        return [response()->json("success"), redirect('admin/linha')];
    }
}
