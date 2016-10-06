<?php
namespace CDC\Loja\Carrinho;

use CDC\Loja\Produto\Produto;
use CDC\Loja\Test\TestCase;

class CarrinhoDeComprasTest extends TestCase
{
    /**
     * @var CarrinhoDeCompras
     */
    private $carrinho;

    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(0, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(900.00, $valor, null, 0.0001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinho->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinho->adiciona(new Produto("Máquina de lavar", 750.00, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1500.00, $valor, null, 0.0001);
    }

    public function testDeveAdicionarItens()
    {
        //garante que o carrinho está vazio
        $this->assertEmpty($this->carrinho->getProdutos());

        $produto = new Produto("Geladeira", 900.0, 1);
        $this->carrinho->adiciona($produto);

        $esperado = count($this->carrinho->getProdutos());
        $this->assertEquals(1, $esperado);

        $this->assertEquals($produto, $this->carrinho->getProdutos()[0]);
    }


}