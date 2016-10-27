<?php
namespace CDC\Loja\RH;

class QuinzeOuVinteECincoPorCento implements RegraDeCalculo
{

    public function calcula(Funcionario $funcionario)
    {
        if( $funcionario->getSalario() < 2500 ) {
            return $funcionario->getSalario() * 0.85;
        }
        return $funcionario->getSalario() * 0.75;
    }

}
