<?php

use App\Http\Response;
use App\Controller\Terminais;

$obRouter->get('/terminais', [
   function () {
        return new Response(200, Terminais\TerminaisController::getTerminais());
   }
]);

$obRouter->get('/terminais/{n_terminal}', [
    function ($n_terminal) {
        return new Response(200, Terminais\TerminaisController::getTerminaisPorNumero($n_terminal));
    }
]);