@extends('layouts.app')

@section('content')
<style>
    .btn-danger {
        margin-left: 10px;
    }
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #92b8b2;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agenda') }}
                    <a href="{{ route("agenda.criar") }}" type="button" class="float-right btn btn-primary" style="background-color: #5b958b; border: none;">Adicionar Agenda</a>
                </div>
                <div class="card-body">
                    @if (isset($agendas) && !$agendas->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Atividade</th>
                                <th scope="col">Data</th>
                                <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <th scope="row">{{ $agenda->id }}</th>
                                        <td>{{ $agenda->descricao }}</td>
                                        <td>{{ $agenda->data_planejada }}</td>
                                        <td class="row">
                                            <a href="{{ route("agenda.editar", $agenda->id) }}" type="button" class="btn btn-secondary"><img src="" alt=""></a>
                                            {!! Form::open(['class' => '', 'name'=>'form', 'route'=>['agenda.excluir', $agenda->id], 'method'=>'delete']) !!}
                                                @method('delete')
                                                @csrf         
                                                <button  type="submit" class="btn btn-danger">Excluir</button>                                    
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
