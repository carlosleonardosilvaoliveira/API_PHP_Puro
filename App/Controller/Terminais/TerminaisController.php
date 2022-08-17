<?php

namespace App\Controller\Terminais;

use App\Model\Entity\Terminais as EntityTerminais;

class TerminaisController
{
    public static function getTerminais ()
    {
        $terminalArray = array();
        $terminalArray["body"] = array();

        $results = EntityTerminais::getTerminais(null, null, null);

        while ($row = $results->fetchObject(EntityTerminais::class)) {

            $e = array(
                'n_terminal' => $row->n_terminal,
                'ponto'  => $row->ponto,
                'uf' => $row->uf,
                'n_serie' => $row->n_serie,
                'disp_atual' => $row->disp_atual,
                'req' => $row->req,
                'wo' => $row->wo,
                'data_chamado' => $row->data_chamado,
                'obs'  => $row->obs
            );

            array_push($terminalArray["body"], $e);
        }
        return json_encode($terminalArray);
    }

    public static function getTerminaisPorNumero ($n_terminal)
    {
        $terminalArray = array();
        $terminalArray["body"] = array();

        $results = EntityTerminais::getTerminaisByNumero($n_terminal);

        $e = array(
            'n_terminal' => $results->n_terminal,
            'ponto'  => $results->ponto,
            'uf' => $results->uf,
            'n_serie' => $results->n_serie,
            'disp_atual' => $results->disp_atual,
            'req' => $results->req,
            'wo' => $results->wo,
            'data_chamado' => $results->data_chamado,
            'obs'  => $results->obs
        );

        array_push($terminalArray["body"], $e);

        return json_encode($terminalArray);
    }
}