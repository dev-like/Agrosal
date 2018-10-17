<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Image;
use Storage;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate(10);
        return view('admin.noticias.index', [
            'noticias' => $noticias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
        'titulo'              => 'required|max:225|unique:noticias,titulo,NULL, deleted_at,deleted_at,NULL',
        'conteudo'            => 'required',
        'datapublicacao'      => 'required|date',
      ));

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->titulo));

        $noticia = new Noticia;
        $noticia->titulo          = $request->titulo;
        $noticia->datapublicacao  = $request->datapublicacao;
        $noticia->descricao       = $request->descricao;
        $noticia->palavraschave   = $request->palavraschave;
        $noticia->conteudo        = $request->conteudo;
        $noticia->slug            = $slug;

        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('noticias/imagens/' . $filename);
            Image::make($image)->resize(1191, 792)->save($location);
            $noticia->capa = $filename;
        }

        $noticia->save();
        $request->session()->flash('success', 'Notícia adicionada com sucesso');
        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::where('slug', '=', $id)->first();
        return view('admin.noticias.show')->with('noticia', $noticia);
    }

    public function tirarAcentos($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"), explode(" ", "a A e E i I o O u U n N C c"), $string);
    }

    public function getSingle($slug)
    {
        $noticia = Noticia::where('slug', '=', $slug)->first();
        return view('admin.noticias.show')->with('noticia', $noticia);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        return view('admin.noticias.edit', [
            'noticia' => $noticia
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::find($id);
        $noticia->fill($request->all());

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->título));

        $noticia->slug            = $slug;

        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('noticias/imagens/' . $filename);
            Image::make($image)->resize(1191, 792)->save($location);

            if ($noticia->capa) {
                $oldFilename = $noticia->capa;
                Storage::delete('noticias/imagens/'.$oldFilename);
            }
            $noticia->capa = $filename;
        }

        $noticia->save();
        $request->session()->flash('success', 'O texto foi modificado com sucesso');
        return redirect()->route('noticia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $noticia = Noticia::find($id);
        if ($noticia->capa) {
            Storage::delete('noticias/imagens/'.$noticia->capa);
        }
        $noticia->delete();


        return response()->json("success");
    }
}
