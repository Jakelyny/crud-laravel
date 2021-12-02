<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function criar()
    {
        return view('agenda.criar')->with([]);
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required' =>  'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'descricao' => 'required',
            'data_planejada' => 'required'
        ], $mensagem);

        try {
            Agenda::create([
                'descricao' => $request->get('descricao'),
                'data_planejada' => $request->get('data_planejada'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null,
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('resposta', [
            'status' => 200,
            'mensagem' => 'Agenda criada!'
        ]);
    }

    public function editar($id)
    {
        $agenda = Agenda::where("id",$id)->get();

        if ($agenda->isEmpty()) {
            return redirect()->route('home')->with('resposta', [
                'status' => 400,
                'mensagem' => 'Acesso indevido!'
            ]);
        }

        return view("agenda.editar")->with([
            "agenda"=>$agenda[0]
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $mensagem = [
            'required' =>  'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'descricao' => 'required',
            'data_planejada' => 'required'
        ], $mensagem);

        try {
            $agenda = Agenda::find($id)->update([
                'descricao' => $request->get('descricao'),
                'data_planejada' => $request->get('data_planejada'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        } 
        return redirect()->route('home')->with('resposta', [
            'status' => 200,
            'mensagem' => 'Agenda atualizada!'
        ]);
    }

    public function excluir($id)
    {
    
        try {
           Agenda::find($id)->delete();
        } catch (\Throwable $th) {
dd('aaaa');
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('resposta', [
            'status' => 200,
            'mensagem' => 'Agenda excluida!'
        ]);
    }
}

