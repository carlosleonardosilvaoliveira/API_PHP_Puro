<?php

namespace App\Model\Entity;

use App\core\Database;

class Terminais
{
    public $id;
    public $n_terminal;
    public $ponto;
    public $uf;
    public $tipo;
    public $marca;
    public $modelo;
    public $n_serie;
    public $ip;
    public $h_operacional;
    public $status;
    public $disp_atual;
    public $req;
    public $wo;
    public $data_chamado;
    public $tipo_chamado;
    public $obs_chamado;
    public $status_chamado;
    public $obs;
    public $email;

    public static function getTerminais ($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('terminais'))->select($where, $order, $limit, $fields);
    }

    public static function getTerminaisByNumero ($n_terminal)
    {
        return self::getTerminais("n_terminal = '{$n_terminal}'")->fetchObject(self::class);
    }

    public function postInsert ()
    {

        $this->id = (new Database('terminais'))->insert([
            'n_terminal'    => $this->n_terminal,
            'ponto'         => $this->ponto,
            'uf'            => $this->uf,
            'tipo'          => $this->tipo,
            'marca'         => $this->marca,
            'modelo'        => $this->modelo,
            'n_serie'       => $this->n_serie,
            'ip'            => $this->ip,
            'h_operacional' => $this->h_operacional,
            'status'        => $this->status
        ]);

        return true;
    }

    public function putUpdate ()
    {
        return (new Database('terminais'))->update("n_terminal = '{$this->n_terminal}'",[
            'email' => $this->email,
            'obs'   => $this->obs
        ]);
    }
}