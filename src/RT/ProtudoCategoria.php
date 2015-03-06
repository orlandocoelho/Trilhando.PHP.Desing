<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 06/03/15
 * Time: 12:47
 */

namespace RT;

use RT\Interfaces\ProdutoCatergoriaInterface;

class ProtudoCategoria implements ProdutoCatergoriaInterface
{
    private $id;
    private $nome;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }



}