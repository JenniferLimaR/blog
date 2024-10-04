<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Postagem;
use App\Models\Categoria;

class FeedController extends Controller


{
  public function welcome(){
    $postagens= Postagem::orderBy('id','DESC')->get();
    return view('welcome', compact('postagens'));
  }

  public function categoria(){
    $categorias = Categoria::orderBy('nome','ASC')->get();
    return view('feed.categoria', compact('categorias'));
  }

  public function categoriaById($id){
    $postagens = Postagem::where('categoria_id', $id)->orderBy('id','DESC')->get();
    return view('feed.categoriaById', compact('postagens'));
  }

}
