@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                 </div>
                @endif

                <form method='POST' action="{{ url('/postagem/' . $postagem->id) }}" >

                    @method('PUT')
                    @csrf


                    <div class="form-group">
                        <label for="exampleInputEmail1">Título</label>
                        <input type="text" name="titulo" value="{{ $postagem->titulo }}" class="form-control" placeholder="Digite o nome da postagem">

                        <label for="exampleInputEmail1">Conteúdo</label>
                        <input type="text" name="titulo" value="{{ $postagem->conteudo }}" class="form-control" placeholder="Digite o nome da postagem">
                    </div>

                    <input type="submit" value="ENVIAR">
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
