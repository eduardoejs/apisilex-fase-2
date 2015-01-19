<?php

namespace EJS\Produtos\Mapper;


use EJS\Database\Conexao;
use EJS\Produtos\Entity\Produto;
use EJS\Registry\Registry;

class ProdutoMapper {

    public function insert(Produto $produto)
    {
        try{
            Registry::set('conexaoDB', Conexao::getDb());
            $conn = Registry::get('conexaoDB');
            $list = $conn->prepare("SELECT * FROM  produtos");
            $list->execute();
            $data = $list->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: ";
            die("{$e->getMessage()}");
        }
        return $data;
    }
} 