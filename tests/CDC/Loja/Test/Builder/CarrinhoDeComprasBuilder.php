<?php
namespace CDC\Loja\Test\Builder;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    /**
     * @var CarrinhoDeCompras
     */
    public $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    /**
     * @return CarrinhoDeComprasBuilder
     */
    public function comItens()
    {
        $valores = func_get_args();
        foreach ($valores as $valor) {
            $this->carrinho->adiciona(
                new Produto("Item", $valor, 1));
        }
        return $this;
    }

    /**
     * @return CarrinhoDeCompras
     */
    public function cria()
    {
        return $this->carrinho;
    }
}
