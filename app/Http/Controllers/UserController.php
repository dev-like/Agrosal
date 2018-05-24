<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MessageBag;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::User()->nivel == 1) {
                return $next($request);
            }
            return redirect()->route('admin.home');
        });
    }

    /**UserController
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate();
        return view('admin.usuarios.index', [
          'usuarios' => $usuarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nome' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email',
          'nivel' => 'required|integer',
          'password' => 'required|min:3|confirmed',
          'password_confirmation' => 'required|min:3',
        ]);

        $user = new User;

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->nivel = $request->nivel;
        $user->password = bcrypt($request->password);

        $user->save();

        $request->session()->flash('Sucesso', "$user->nome adicionado com sucesso");
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.edit', [
          'usuario' => $usuario,
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
        $this->validate($request, [
          'nome' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email,'.$id,
          'nivel' => 'required|integer',
        ]);

        $user = User::find($id);

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->nivel = $request->nivel;

        $user->save();

        $request->session()->flash('Sucesso', "$user->nome editado com sucesso");
        return redirect()->route('usuario.index');
    }

    public function editPassword(Request $request, $id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.edit_password', [
          'usuario' => $usuario,
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
          'password' => 'required|min:3|confirmed',
          'password_confirmation' => 'required|min:3|',
          'password_user' => 'required|min:3|',
        ]);
        if (Hash::check($request->password_user, Auth::User()->password, [])) {
            $user = User::find($id);
            $user->password = bcrypt($request->password);
            $user->save();

            $request->session()->flash('Sucesso', "Senha de $user->nome alterada  com sucesso");
            return redirect()->route('usuario.index');
        } else {
            return redirect()->back()->withErrors(['error_password_user' => 'Senha de usuário incorreta']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Hash::check($request->senhaUsuarioLogado, Auth::User()->password, [])) {
            $user = User::find($request->idUsuario);
            $nomeUsuario = $user->nome;
            $user->delete();
            $request->session()->flash('Sucesso', "$nomeUsuario Deletado com sucesso");
            return redirect()->route('usuario.index');
        } else {
            return redirect()->route('usuario.index')->withErrors(['error_password_user' => 'Senha de usuário incorreta']);
        }
    }
}
