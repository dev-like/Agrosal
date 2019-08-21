<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Linha;
use App\Models\Noticia;
use App\Models\Informacaonutricional;
use App\Models\Produto;
use App\Models\Quemsomos;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use DB;

class WebSiteController extends Controller
{
    public function pagenotfound()
    {
        $quemsomos = Quemsomos::find(1);
        return view('errors.404', ['quemsomos' => $quemsomos]);
        return view('admin.index');
    }

    public function home()
    {
        $linha = Linha::all();
        $noticia = Noticia::all();
        $quemsomos = Quemsomos::find(1);

        return view('front.index', [
        'quemsomos' => $quemsomos,
        'linha' => $linha,
        'noticia' => $noticia,
        ]);
    }
    public function linha()
    {
        $linha = Linha::all();
        $produto = Produto::where('linha_id', $linha);
        $quemsomos = Quemsomos::find(1);

        return view('front.linhas', [
        'linha' => $linha,
        'produto' =>  $produto,
        'quemsomos' => $quemsomos,
      ]);
    }
    public function getSingleLinha($slug)
    {
        $linha = Linha::where('slug', '=', $slug)->first();

        if($linha == NULL){
          return redirect()->route('notfound');
        }else{

            if (count($linha) == 0)
            {
              $this->pagenotfound();
              return;
            }
            $produto = DB::table('produtos')->where('linha_id', $linha->id)->get();
            $quemsomos = Quemsomos::find(1);

            $produtoEsquerda = [];
            $produtoDireita = [];

            for ($i=0; $i < count($produto); $i++) {
                if ($i % 2 != 0) {
                    $produtoDireita[] = $produto[$i];
                } else {
                    $produtoEsquerda[] = $produto[$i];
                }
            }

            return view('front.linhas', [
              'produto' =>  $produto,
              'produtoEsquerda' => $produtoEsquerda,
              'produtoDireita' => $produtoDireita,
              'linha' => $linha,
              'quemsomos' => $quemsomos,
            ]);
      }
    }
    public function noticias()
    {
        $noticia = Noticia::all();
        $quemsomos = Quemsomos::find(1);

        return view('front.noticias', [
        'noticia' => $noticia,
        'quemsomos' => $quemsomos,
      ]);
    }
    public function getSingleNoticia($slug)
    {
        $noticia = Noticia::where('slug', '=', $slug)->first();
        $quemsomos = Quemsomos::find(1);

        if($noticia == NULL){
          return redirect()->route('notfound');
        }else{

        return view('front.noticias', [
          'noticia' => $noticia,
          'quemsomos' => $quemsomos,
        ]);
      }
    }
    public function produtos()
    {
        $quemsomos = Quemsomos::find(1);
        $linha = Linha::all();
        $produto = Produto::all();
        $informacaonutricionais  = informacaonutricional::where('produtos_id', '=', $produto->id);

        return view('front.produtos', [
        'linha' => $linha,
        'produto' =>  $produto,
        'quemsomos' => $quemsomos,
        'informacaonutricional' => $informacaonutricionais,
      ]);
    }
    public function getSingleProduto($slug)
    {
        $produto = Produto::where('slug', '=', $slug)->first();
        $quemsomos = Quemsomos::find(1);
        $linha = Linha::all();
        $informacaonutricionais  = informacaonutricional::where('produtos_id', '=', $produto->id)->get();


        return view('front.produtos', [
          'quemsomos' => $quemsomos,
          'produto' =>  $produto,
          'linha' => $linha,
          'informacaonutricional' => $informacaonutricionais,
        ]);
    }
}
