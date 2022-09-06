<?php

namespace App\Utils;
use App\Repository\ConsultaRepository;

class Validator
{
    public function hasComment(?int $pregunta, ConsultaRepository $consultaRepository): bool
    {
        $consultas = $consultaRepository->findAll();

        foreach($consultas as $consulta) {

            if($pregunta == 0 && $consulta->getComentario1())
                return true;
            if($pregunta == 1 && $consulta->getComentario2())
                return true;
            if($pregunta == 2 && $consulta->getComentario3())
                return true;
            if($pregunta == 3 && $consulta->getComentario4())
                return true;
        }
        return false;
    }
}