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

    public static function postInsert ($request)
    {
        $terminalArray = array();
        $terminalArray["body"] = array();

        $results = new EntityTerminais();

        $getParams = $request->getQueryParams();

        $results->n_terminal    = $getParams['n_terminal'] ?? '';
        $results->ponto         = $getParams['ponto'] ?? '';
        $results->uf            = $getParams['uf'] ?? '';
        $results->tipo          = $getParams['tipo'] ?? '';
        $results->marca         = $getParams['marca'] ?? '';
        $results->modelo        = $getParams['modelo'] ?? '';
        $results->n_serie       = $getParams['n_serie'] ?? '';
        $results->ip            = $getParams['ip'] ?? '';
        $results->h_operacional = $getParams['h_operacional'] ?? '';
        $results->status        = $getParams['status'] ?? '';
        $results->postInsert();

        $e = array(
            'n_terminal'    => $results->n_terminal,
            'ponto'         => $results->ponto,
            'uf'            => $results->uf,
            'tipo'          => $results->tipo,
            'marca'         => $results->marca,
            'modelo'        => $results->modelo,
            'n_serie'       => $results->n_serie,
            'ip'            => $results->ip,
            'h_operacional' => $results->h_operacional,
            'status'        => $results->status
        );

        array_push($terminalArray["body"], $e);

        return json_encode($terminalArray);
    }

    public static function putUpdate ($request, $n_terminal)
    {
        $terminalArray = array();
        $terminalArray["body"] = array();

        $results = EntityTerminais::getTerminaisByNumero($n_terminal);

        //$data = json_decode(file_get_contents("php://input"));
        //$results->email = $data->email ?? '';
        //$results->obs   = $data->obs ?? '';

        $getParams = $request->getQueryParams();

        $results->email = $getParams['email'] ?? '';
        $results->obs   = $getParams['obs'] ?? '';
        $results->putUpdate();

        $e = array(
            'n_terminal'    => $results->n_terminal,
            'email'         => $results->email,
            'obs'           => $results->obs
        );

        array_push($terminalArray["body"], $e);

        return json_encode($terminalArray);
    }
}