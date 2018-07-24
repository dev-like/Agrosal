<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function index()
    {
        return view('front/partials/_bottom');
    }

    public function post(Request $req)
    {
        $req->validate([
        'nome' => 'required',
        'email' => 'required',
        'mensagem' => 'required',
      ]);
        $data = [
        'nome'=>$req->nome,
        'email'=>$req->email,
        'corpoMensagem'=>$req->mensagem,
      ];

        Mail::send('mail.mail', $data, function ($mensagem) use ($data) {
            $mensagem->from($data['email']);
            $mensagem->to('agrosal@nutrientesagrosal.com.br', 'Teste');
            $mensagem->subject('Mensagem site.');
        });

        return redirect()->back();
    }
}
