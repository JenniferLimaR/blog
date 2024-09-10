@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <p><strong>Nome:</strong> {{ $postagem->nome }}</p>
                <p><strong>Criação:</strong> {{ $postagem->created_at }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
