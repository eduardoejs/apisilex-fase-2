<?php

namespace EJS\Produtos\Controller;

use EJS\Produtos\Entity\Produto;
use EJS\Produtos\Mapper\ProdutoMapper;
use EJS\Produtos\Service\ProdutoService;
use EJS\Produtos\Controller\ProdutoControllerInterface;
use Silex\Application;


class ProdutoController implements ProdutoControllerInterface {

    private $produto;

    public function connect(Application $app)
    {
        $produto = $app['controllers_factory'];

        $produto->get('/', function() use ($app){
            return self::getProduto($app);
        });

        $produto->get('/{produto}', function($produto) use ($app){
            return self::getProdutoId($app, $produto);
        });

        return $produto;
    }


    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getProduto(Application $app)
    {
        $data['nome'] = null;
        $data['descricao'] = null;
        $data['valor'] = null;

        $result = $app['produtoService']->insert($data);

        return $app->json($result);
    }

    public function getProdutoId(Application $app, $id)
    {
        $data['nome'] = null;
        $data['descricao'] = null;
        $data['valor'] = null;

        $result = $app['produtoService']->insert($data);

        if(!isset($result[$id])){
            $app->abort(404, "Produto {$id} nao encontrado.");
        }
        return $app->json($result[$id]);

    }

} 