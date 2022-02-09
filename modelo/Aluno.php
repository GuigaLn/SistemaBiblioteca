<?php

class Aluno
{

    private $codigo;
    private $nome;
    private $status;

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setStatus($status)
    {
        if(is_numeric($status))
        {
            $this->status = filter_var($status, FILTER_SANITIZE_STRIPPED);
        }
    }

}
