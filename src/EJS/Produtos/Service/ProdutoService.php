<?php

namespace EJS\Produtos\Service;

use EJS\Database\Conexao;
use EJS\Produtos\Entity\Produto;
use EJS\Produtos\Mapper\ProdutoMapper;

class ProdutoService {

    private $produto;
    private $produtoMapper;
    private $conexao;

    function __construct(Produto $produto, ProdutoMapper $produtoMapper, Conexao $conexao) {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
        $this->conexao = $conexao;
    }

    public function listProdutos(array $data)
    {
        $produtoEntity = $this->produto;
        $produtoEntity->setNome($data['nome']);
        $produtoEntity->setDescricao($data['descricao']);
        $produtoEntity->setValor($data['valor']);

        $produtoMapper = $this->produtoMapper;
        $result = $produtoMapper->listAll($produtoEntity, $this->conexao);

        return $result;
    }
} 