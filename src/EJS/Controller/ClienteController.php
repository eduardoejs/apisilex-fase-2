<?php
namespace EJS\Controller;

use Silex\Application;
use EJS\Controller\ClienteControllerInterface;
use Symfony\Component\HttpFoundation\Response;


class ClienteController implements ClienteControllerInterface{

    private $cliente;

    public function connect(Application $app)
    {
        $cliente = $app['controllers_factory'];

        $cliente->get('/', function() use ($app){
           return self::getCliente($app);
        });

        $cliente->get('/{cliente}', function($cliente) use ($app){
            return self::getClienteId($app, $cliente);
        });

        return $cliente;
    }

    public function setCliente(array $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getCliente(Application $app)
    {
        return $app->json($this->cliente);
    }

    public function getClienteId(Application $app, $id)
    {
        if(!isset($this->cliente[$id])){
            $app->abort(404, "Cliente não encontrado!");
        }

        return $app->json($this->cliente[$id]);
    }
} 