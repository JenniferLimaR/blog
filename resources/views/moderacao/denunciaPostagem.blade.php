@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if (session('mensagem'))
                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Postagem - título</th>
                          <th>Postagem - Autor</th>
                          <th>Denunciante</th>
                          <th>Conteúdo Denúncia</th>
                          <th>Status</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($denunciaPostagem as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->postagem->titulo }}</td>
                          <td>{{ $value->postagem->autor->name }}</td>
                          <td>{{ $value->denunciante->name }}</td>
                          <td>{{ $value->conteudo }}</td>
                          <td>{{ $value->status}}</td>
                          <td>

                    <!-----tag para alinhar os botões--------->
                        <div class="btn-group" role="group">
                    <!-----tag para alinhar os botões--------->

                              <a href="{{ url('/ModeracaoDenunciaPostagemAceito/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true">ACEITO</a>

                              <a href="{{ url('/ModeracaoDenunciaPostagemNegado/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true">NEGADO</a>

                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
