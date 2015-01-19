<?php

namespace EJS\Produtos\Service;


use EJS\Produtos\Entity\Produto;
use EJS\Produtos\Mapper\ProdutoMapper;

class ProdutoService {

    private $produto;
    private $produtoMapper;

    function __construct(Produto $produto, ProdutoMapper $produtoMapper) {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert(array $data)
    {
        $produtoEntity = $this->produto;
        $produtoEntity->setNome($data['nome']);
        $produtoEntity->setDescricao($data['descricao']);
        $produtoEntity->setValor($data['valor']);

        $produtoMapper = $this->produtoMapper;
        $result = $produtoMapper->insert($produtoEntity);

        return $result;
    }
} 