@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #004443;
    }
    .button {
        background-color: #00755c; 
        border: none;
        color: white;
        padding: 8px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        border-radius: 5px;
    }
    .button:hover {
        background-color: #007F63;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agenda') }}
                    <a href="{{ route("home") }}" type="button" style="background-color: #00755c; " class="float-right btn btn-secondary">Voltar</a>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('agenda.inserir') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-md-6">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="data_planejada" class="form-label">Data Planejada</label>
                            <input type="date" class="form-control" id="data_planejada" name="data_planejada" value="{{ old('data_planejada') }}">
                        </div>
                        <div class="col-12" style="margin: 15px 0;">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="7">{{ old('observacao') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="button" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
