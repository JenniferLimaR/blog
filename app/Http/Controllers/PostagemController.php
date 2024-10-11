<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class postagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $postagens = Postagem::where('user_id', $user_id)->orderBy('titulo', 'ASC')->get();
        return view('postagem.postagem_index', compact('postagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome','ASC')->get();
        return view('postagem.postagem_create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1 -pegar o conteudo do arquivo
        $content = file_get_contents ($request->file('imagem'));


        $validated = $request->validate([
            'categoria_id' => 'required',
            // 2 -valida o tipo do arquivo
            'imagem' => 'mimes:jpg,bmp,png',
            'titulo' => 'required|min:5',
            'conteudo' => 'required|min:5',
        ]);

        $postagem = new postagem();
        $postagem->categoria_id = $request->categoria_id;
        $postagem->user_id = Auth::id();
          // 3 -converter para base64
        $postagem->imagem = base64_encode($content);
        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;
        $postagem->save();

        return redirect()->route('postagem.index')->with('mensagem', 'postagem cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postagem = postagem::find($id);
        return view('postagem.postagem_show', compact('postagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

      //verificar se o usuario pode editar essa postagem
      $user_id = Auth::id();
      $ehDoUsuario = Postagem::where('id', $id)->where('user_id', $user_id)->exists();

      if(!$ehDoUsuario){
        return redirect()->route('postagem.index')->with('mensagem', 'Você não tem permissão para alterar essa postagem!!!!');
      }



      $categorias = Categoria::orderBy('nome','ASC')->get();
      $postagem = postagem::find($id);
      return view('postagem.postagem_edit', compact('postagem','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      //verificar se o usuario pode editar essa postagem
      $user_id = Auth::id();
      $ehDoUsuario = Postagem::where('id', $id)->where('user_id', $user_id)->exists();
      if(!$ehDoUsuario){
        return redirect()->route('postagem.index')->with('mensagem', 'Você não tem permissão para alterar essa postagem!!!!');
      }



        // 1 -pegar o conteudo do arquivo
        if($request->file('imagem')){
            $content = file_get_contents ($request->file('imagem'));
        }


        $validated = $request->validate([
            'categoria_id' => 'required',
            // 2 -valida o tipo do arquivo
            'imagem' => 'mimes:jpg,bmp,png',
            'titulo' => 'required|min:5',
            'conteudo' => 'required|min:5',
        ]);

        $postagem = postagem::find($id);
        $postagem->categoria_id = $request->categoria_id;
        $postagem->user_id = Auth::id();
        // 3 -converter para base64
        if($request->file('imagem')){
            $postagem->imagem = base64_encode($content);
        }
        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;
        $postagem->save();

        return redirect()->route('postagem.index')->with('mensagem', 'postagem alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postagem = postagem::find($id);
        $postagem->delete();

        return redirect()->route('postagem.index')->with('mensagem', 'postagem excluida com sucesso!');
    }
}
