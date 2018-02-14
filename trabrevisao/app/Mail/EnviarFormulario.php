<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarFormulario extends Mailable
{
    use Queueable, SerializesModels;
    public $quilometragem;
    public $data;
    public $hora;
    public $servico;
    public $veiculo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($veiculo,$quilometragem,$data,$hora,$servico)
    {
       $this->servico = $servico;
       $this->veiculo = $veiculo;
       $this->quilometragem = $quilometragem;
       $this->data = $data;
       $this->hora = $hora;

  }

    /**
     * Build the message.
     *
     * @return $this
     */
     
    public function build()
    {

        return $this->view('emails.criarformulario');
    }
}
