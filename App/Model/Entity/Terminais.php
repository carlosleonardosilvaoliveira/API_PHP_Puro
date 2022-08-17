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
}