@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <a href="{{ url('/categoria/create') }}" class="btn btn-success" role="button" aria-pressed="true">Criar</a>

                @if (session('mensagem'))
                <br>
                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>
                @endif

                <table>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Ações</th>
                    </tr>
                    @extends('adminlte::page')

                    @section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Dashboard') }}</div>

                                    <a href="{{ url('/categoria/create') }}" class="btn btn-success mb-3" role="button" aria-pressed="true">Criar</a>

                                    @if (session('mensagem'))
                                    <div class="alert alert-success">
                                        {{ session('mensagem') }}
                                    </div>
                                    @endif

                                    <table class="table">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Nome</th>
                                              <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categorias as $value)
                                            <tr>
                                              <td>{{ $value->id }}</td>
                                              <td>{{ $value->nome }}</td>
                                              <td>
                                                <div class="btn-group" role="group">
                                                  <a href="{{ url('/categoria/' . $value->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Visualizar</a>

                                                  <a href="{{ url('/categoria/' . $value->id . '/edit') }}" class="btn btn-warning" role="button" aria-pressed="true">Editar</a>

                                                  <form method="POST" action="{{ url('/categoria/' . $value->id) }}" class="d-inline">
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

                    @foreach($categorias as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->nome}}</td>
                      <td>
                        <a href="{{ url('/categoria/' . $value->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Visualizar</a>

                        <a href="{{ url('/categoria/' . $value->id . '/edit') }}" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Editar</a>

                        <form method="POST" action='{{ url('/categoria/' . $value->id) }}'>
                            @method('DELETE')
                            @csrf
                            <INPUT type="submit" class="btn btn-danger btn-lg active" value="Excluir">
                        </form>

                      </td>
                    </tr>
                    @endforeach
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
