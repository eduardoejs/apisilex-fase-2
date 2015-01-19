<?php

require_once __DIR__ . '/../config/bootstrap.php';

use EJS\Controller\ClienteController;
use EJS\Produtos\Controller\ProdutoController;

$array = require_once __DIR__ . '/../src/EJS/ArrayData/ArrayClientesJSON.php';

$cliente = new ClienteController();
$cliente->setCliente($array);
$cliente->getCliente($app);

$app->mount('/clientes', $cliente->connect($app));

$produto = new ProdutoController();
$app->mount('/produtos', $produto->connect($app));

$app->run();