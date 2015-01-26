<?php

require_once __DIR__ . '/../config/bootstrap.php';

use EJS\Controller\ClienteController;
use EJS\Produtos\Controller\ProdutoController;
use EJS\Produtos\Entity\Produto;
use EJS\Produtos\Mapper\ProdutoMapper;
use EJS\Produtos\Service\ProdutoService;
use EJS\Database\Conexao;

$app['produtoService'] = function() {
    $produto = new Produto();
    $produtoMapper = new ProdutoMapper();
    $conexao = new Conexao();
    $produtoService = new ProdutoService($produto, $produtoMapper, $conexao);

    return $produtoService;
};

$array = require_once __DIR__ . '/../src/EJS/ArrayData/ArrayClientesJSON.php';

$cliente = new ClienteController();
$cliente->setCliente($array);
$cliente->getCliente($app);

$app->mount('/clientes', $cliente->connect($app));

$app->mount('/produtos', new ProdutoController());

$app->run();