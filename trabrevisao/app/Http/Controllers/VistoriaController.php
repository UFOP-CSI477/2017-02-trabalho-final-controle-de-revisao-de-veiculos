<?php

namespace App\Http\Controllers;

use App\Vistoria;
use App\Servico;
use App\Veiculo;
use Illuminate\Http\Request;
use Session;
use DB;


class VistoriaController extends Controller

{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
          if(auth()->user()->type==1){
            $vistorias= Vistoria::with('veiculo')->where('user_id',auth()->user()->id)->get();
          }

          else{
            $vistorias= Vistoria::with('veiculo')->get();

          }

          $previsoes = array();
          foreach ($vistorias as $v) {
            $orderdate = explode('-', $v->data);
            $year  = $orderdate[0];
            $month = $orderdate[1];
            $day   = $orderdate[2];

            $month = $month + 6;
            if($month/12 >= 1 ){
              if($month%12>0){
                $year ++;
                $month = $month%12;
              }
            }
            $data = $year."-".$month."-".$day;
            array_push($previsoes,$data);
          }
          return view('vistorias.index')->with('vistorias',$vistorias)->with('previsoes',$previsoes);
    }

    public function create()
    {
      if(auth()->user()->type ==2)
      {
          $servicos = servico::all();
          $veiculos = veiculo::all();
          return view('vistorias.create')->with('servicos',$servicos)->with('veiculos',$veiculos);
      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para criar um vistoria.";
        request()->session()->flash('danger',$mensagem);
        return redirect()->to('/home');
      }
    }

    public function store(Request $request)
    {
      $veiculo= Veiculo::where('id',$request->input('veiculo'))->get();
      if(auth()->user()->type ==2)
      {
      Vistoria::create([
          'data' => $request->input('data'),
          'hora' => $request->input('hora'),
          'quilometragem' => $request->input('quilometragem'),
          'veiculo_id' => $request->input('veiculo'),
          'servico_id' => $request->input('servico'),
          'user_id' => $veiculo->first()->user_id
      ]);
      $mensagem = "Vistoria adicionada com sucesso.";
      request()->session()->flash('sucesso',$mensagem);
      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para criar um vistoria.";
        request()->session()->flash('danger',$mensagem);
      }
      return redirect()->to('/home');
    }

    public function edit(Vistoria $vistoria)
    {
        if(auth()->user()->type ==2)
        {
          $servicos = Servico::all();
          $veiculos = veiculo::all();
          return view('vistorias.edit')->withVistoria($vistoria)->with('servicos',$servicos)->with('veiculos',$veiculos);
        }
        else
        {
          $mensagem = "Desculpe, você não tem permissão para editar uma vistoria.";
          request()->session()->flash('danger', $mensagem);
          return redirect()->to('/home');
        }
    }

    public function update(Request $request, Vistoria $vistoria)
    {
        if(auth()->user()->type ==2)
        {
        $vistoria->update($request->all());
        $mensagem = "Revisão de número " . $vistoria->id . " alterada com sucesso.";
        request()->session()->flash('sucesso', $mensagem);
        }
        else
        {
          $mensagem = "Desculpe, você não tem permissão para editar uma revisão.";
          request()->session()->flash('danger', $mensagem);
        }
        return redirect()->to('/home');
    }

    public function destroy(Vistoria $vistoria)
    {
      if(auth()->user()->type ==2)
      {
        $vistoria->delete();
        request()->session()->flash('sucesso','Revisão deletada com sucesso.');
      }
      else
      {
        $mensagem = "Desculpe, você não tem permissão para deletar revisões.";
        request()->session()->flash($mensagem, 'danger');
      }
        return redirect()->to('/home');
    }
}
