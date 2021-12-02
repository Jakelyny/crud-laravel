@extends('layouts.app')

@section('content')
<style>
    .btn-danger {
        margin-left: 10px;
    }
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #92b8b2;
        background-image: url('https://c.tenor.com/nwtnk3BayeEAAAAd/pixel-art-cat.gif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: 100%;
    }
    img {
        width: 20px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agenda') }}
                    <a href="{{ route("agenda.criar") }}" type="button" class="float-right btn btn-primary" style="background-color: #5b958b; border: none;">Adicionar Atividade</a>
                </div>
                <div class="card-body">
                    @if (isset($agendas) && !$agendas->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"> </th>
                                <th scope="col">Atividade</th>
                                <th scope="col">Entrega</th>
                                <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <th scope="row"> </th>
                                        <td>{{ $agenda->descricao }}</td>
                                        <td>{{ $agenda->data_planejada }}</td>
                                        <td class="row">
                                            <a disabled href="{{ route("agenda.editar", $agenda->id) }}" type="button" title="Editar" class="btn btn-secondary"><img src="/img/lapis.png" alt="Editar"></a>
                                            {!! Form::open(['class' => '', 'name'=>'form', 'route'=>['agenda.excluir', $agenda->id], 'method'=>'delete']) !!}
                                                @method('delete')
                                                @csrf         
                                                <button  type="submit" class="btn btn-danger" title="Excluir"><img src="/img/delete.png" alt="Excluir"></button>                                    
                                            </form>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
