<?php

namespace EJS\Produtos\Controller;
use Silex\Application;

interface ProdutoControllerInterface {

    public function connect(Application $app);
    public function getProduto(Application $app);
    public function getProdutoId(Application $app, $id);

} 