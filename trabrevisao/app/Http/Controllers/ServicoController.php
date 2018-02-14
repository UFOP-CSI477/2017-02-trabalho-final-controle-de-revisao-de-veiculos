<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;
use Session;
use DB;


class ServicoController extends Controller

{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
          $servicos = servico::all();
          return view('servicos.index')->with('servicos', $servicos);
    }

    public function create()
    {
      if(auth()->user()->type ==2)
      {
          return view('servicos.create');
      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para criar um servico.";
        request()->session()->flash($mensagem, 'danger');
        return redirect()->to('/home');
      }
    }

    public function store(Request $request)
    {
      Servico::create([
          'nome' => $request->input('nome'),
          'valor' => $request->input('valor'),
          'user_id' => auth()->user()->id
      ]);
      $mensagem = "Servico " . $request->input('nome') . " adicionado com sucesso.";
      request()->session()->flash('sucesso',$mensagem);

      return redirect()->to('/home');
    }



    public function edit(Servico $servico)
    {
        if(auth()->user()->type ==2)
        {
          return view('servicos.edit')->withServico($servico);
        }
        else
        {

          $mensagem = "Desculpe, você não tem permissão para editar um serviço.";
          request()->session()->flash('danger', $mensagem);
          return redirect()->to('/home');
        }
    }

    public function update(Request $request, Servico $servico)
    {
        if(auth()->user()->type ==2)
        {
        $servico->update($request->all());
        $mensagem = "Servico " . $request->input('nome') . " alterado com sucesso.";
        request()->session()->flash('sucesso', $mensagem);
        }
        else
        {
          $mensagem = "Desculpe, você não tem permissão para editar um servico.";
          request()->session()->flash('danger', $mensagem);
        }

        return redirect()->to('/home');
    }

    public function destroy(Servico $servico)
    {
      if(auth()->user()->type ==2)
      {
          $servico->delete();
          request()->session()->flash('sucesso', 'Servico deletado com sucesso.');

      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para deletar servicos.";
        request()->session()->flash('danger', $mensagem);
      }
        return redirect()->to('/home');
    }


}
