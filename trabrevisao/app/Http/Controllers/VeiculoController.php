<?php

namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;
use Session;


class VeiculoController extends Controller

{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
          if (auth()->user()->type==2) {
            $veiculos = veiculo::all();
            return view('veiculos.index')->with('veiculos', $veiculos);
          }

    }

    public function create()
    {
      if(auth()->user()->type ==1)
      {
          return view('veiculos.create');
      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para criar um veiculo.";
        request()->session()->flash('danger',$mensagem);
        return redirect()->to('/home');
      }
    }

    public function store(Request $request)
    {
      Veiculo::create([
          'placa' => $request->input('placa'),
          'cor' => $request->input('cor'),
          'modelo' =>$request->input('modelo'),
          'user_id' => auth()->user()->id
      ]);
      $mensagem = "Veiculo " . $request->input('nome') . " adicionado com sucesso.";
      request()->session()->flash('sucesso',$mensagem);

      return redirect()->to('/home');
    }

    public function edit(Veiculo $veiculo)
    {
        if(auth()->user()->type ==2)
        {
          return view('veiculos.edit')->withVeiculo($veiculo);
        }
        else
        {
          $mensagem = "Desculpe, você não tem permissão para editar um veiculo.";
          request()->session()->flash('danger',$mensagem);

        }
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $veiculo->update($request->all());
        $mensagem = "Veiculo " . $veiculo->placa . " alterado com sucesso.";
        request()->session()->flash('sucesso',$mensagem);
        return redirect()->to('/home');
    }

    
}
