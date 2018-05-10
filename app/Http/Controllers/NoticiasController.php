<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticias;
use Image;
use Storage;
use App\User;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticia = Noticias::paginate();
        return view('admin.noticias.index', [
            'noticias' => $noticia
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
        'título'              => 'required|max:225',
        'descrição'           => 'max:400',
        'data_de_publicação'  => 'required|date',
        'conteúdo'            => 'required',
        'capa'                => 'sometimes|image',
      ));

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->titulo)."-".time());

        $noticia = new Noticia;
        $noticia->titulo          = $request->título;
        $noticia->descricao       = $request->descrição;
        $noticia->data_publicacao = $request->data_de_publicação;
        $noticia->slug            = $slug;
        $noticia->conteudo        = $request->conteúdo;

        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('noticias/imagens/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $noticia->capa = $filename;
        }

        $noticia->save();
        $request->session()->flash('success', 'Notícia adicionada com sucesso');

        // return redirect()->route('noticia.show', $noticia->id);
        return redirect()->route('noticias.index', $noticia->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticias::find($id);
        return view('admin.noticias.show', [
          'noticia' => $noticia
      ]);
    }

    public function tirarAcentos($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
    }

    public function getSingle($slug)
    {
        $noticia = Noticias::where('slug', '=', $slug)->first();
        return view('admin.noticias.slug', [
          'noticia' => $noticia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticias::find($id);
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

        $this->validate($request, array(
        'título'              => 'required|max:225',
        'descrição'           => 'max:400',
        'data_de_publicação'  => 'required|date',
        'conteúdo'            => 'required',
        'capa'                => 'sometimes|image',
      ));

        $slug = Self::tirarAcentos(str_replace(" ", "-", $request->título)."-".time());

        $noticia->titulo          = $request->título;
        $noticia->descricao       = $request->descrição;
        $noticia->data_publicacao = $request->data_de_publicação;
        $noticia->slug            = $slug;
        $noticia->conteudo        = $request->conteúdo;

        if ($request->hasFile('capa')) {
            $image = $request->file('capa');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('noticias/imagens/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            if ($noticia->capa) {
                $oldFilename = $noticia->capa;
                Storage::delete('noticias/imagens/'.$oldFilename);
            }

            $noticia->capa = $filename;
        }

        $noticia->save();

        $request->session()->flash('success', 'O texto foi modificado com sucesso');

        return redirect()->route('noticia.show', $noticia->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticias::find($id);
        if ($noticia->capa) {
            Storage::delete('noticias/imagens/'.$noticia->capa);
        }
        $noticia->delete();

        return response()->json("Sucesso");
    }
}
