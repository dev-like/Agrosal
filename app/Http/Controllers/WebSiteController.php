<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Linha;
use App\Models\Noticia;
use App\Models\Produto;
use App\Models\Quemsomos;

class WebSiteController extends Controller
{
    public function home()
    {
        $quemsomos = Quemsomos::find(2);
        return view('front.index', [
        'quemsomos' => $quemsomos,
      ]);
    }
}
