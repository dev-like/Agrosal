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
    public function index()
    {
        $quemsomos = QuemSomos::get();
        $quemsomos = count($quemsomos) ? $quemsomos[0] : new QuemSomos();
        return view('admin.quemsomos.index', [
        'quemsomos' => $quemsomos
      ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quemsomos.index');
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
        'nomefantasia'        => 'required|max:225',
        'email'               => 'required|max:225',
      ));
        $requestData = $request->all();
        $quemsomos = quemsomos::create($requestData);

        $request->session()->flash('success', 'Quem Somos adicionado com sucesso');
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

        $request->session()->flash('success', 'O texto foi modificado com sucesso');
        return redirect('admin/quemsomos')->with('flash_message', 'Quem somos alterado com sucesso !');
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
        $quemsomos = quemsomos::find($id);
        $quemsomos->delete();
        return [response()->json("Sucesso"), redirect('admin/quemsomos')];
    }
}
