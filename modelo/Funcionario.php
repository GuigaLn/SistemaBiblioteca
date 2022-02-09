<?php

class Funcionario
{

    private $codigo;
    private $nome;
    private $senha;

    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setCodigo($codigo)
    {
        if(is_numeric($codigo))
        {
            $this->codigo = filter_var($codigo, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setNome($nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
    }

    public function setSenha($senha)
    {
        $this->senha = filter_var($senha, FILTER_SANITIZE_STRIPPED);
    }

}
