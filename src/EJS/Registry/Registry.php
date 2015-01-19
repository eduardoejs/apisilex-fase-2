<?php

namespace EJS\Registry;


class Registry
{
    protected static $values;


    static function set($index, $valor)
    {
        static::$values[$index] = $valor;

    }

    static function get($index)
    {
        if(!isset(static::$values[$index])) {
            throw new \InvalidArgumentException("Não há valor registrado no indice {$index}!");
        }
        return static::$values[$index];
    }
}

