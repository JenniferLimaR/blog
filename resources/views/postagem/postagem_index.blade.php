@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <a href="{{ url('/postagem/create') }}" class="btn btn-success mb-3" role="button" aria-pressed="true">Criar</a>

                @if (session('mensagem'))
                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>
                @endif

            <script>
                function ConfirmDelete(){
                    return confirm('Tem certeza que deseja excluir este registro?');
                }
            </script>

                <table class="table">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Título</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postagens as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->titulo }}</td>
                          <td>


                    <!-----tag para alinhar os botões--------->
                        <div class="btn-group" role="group">
                    <!-----tag para alinhar os botões--------->
                              <a href="{{ url('/postagem/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Visualizar</a>

                              <a href="{{ url('/postagem/' . $value->id . '/edit') }}" class="btn btn-warning" role="button" aria-pressed="true">Editar</a>

                              <form method="POST" action='{{ url('/postagem/' . $value->id) }}' onsubmit="return ConfirmDelete()">
                                  @method('DELETE')
                                  @csrf
                                  <input type="submit" class="btn btn-danger" value="Excluir">
                              </form>
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