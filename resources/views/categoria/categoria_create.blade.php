@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form method='POST' {{ URL('/categoria') }}">


                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome da categoria">
                    </div>

                    <input type="submit" value="ENVIAR">
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
