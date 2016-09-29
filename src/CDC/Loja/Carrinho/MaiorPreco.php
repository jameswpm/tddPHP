<?php
namespace CDC\Loja\Carrinho;

class MaiorPreco
{
    public function encontra(CarrinhoDeCompras $carrinho)
    {
        if (count($carrinho->getProdutos()) === 0 ) {
            return 0;
        }

        $maiorValor = $carrinho->getProdutos()[0]->getValorTotal();
        foreach ($carrinho->getProdutos() as $produto) {
            if ($maiorValor <= $produto->getvalorTotal()) {
                $maiorValor = $produto->getValorTotal();
            }
        }

        return $maiorValor;
    }
}