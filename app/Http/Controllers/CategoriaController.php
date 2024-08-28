<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::orderby('nome','ASC')->get();
        //dd($categorias);

        return view('categoria.categoria_index',compact('categorias'));

        dd('CATEGORIA-INDEX');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('CREATE');
        return view('categoria.categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|min:5',

        ]);

        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('categoria.index')->with('mensagem', 'Categoria cadastrada com sucesso!');

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd('show: ' . $id);

        $categoria = Categoria::find($id);
        return view('categoria.categoria_show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
