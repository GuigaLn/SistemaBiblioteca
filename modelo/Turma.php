<?php

class Turma
{

    private $codigo;
    private $descricao;
    private $ano_letivo;
    private $periodo;

    public function getCodigo()
    {
        return $this->codigo;
    }
    
    function getDescricao()
    {
        return $this->descricao;
    }

    function getAno_letivo()
    {
        return $this->ano_letivo;
    }

    function getPeriodo()
    {
        return $this->periodo;
    }

    public function setCodigo($codigo)
    {
        if(is_numeric($codigo))
        {
            $this->codigo = filter_var($codigo, FILTER_SANITIZE_STRIPPED);
        }
    }

    function setDescricao($descricao)
    {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_STRIPPED);
    }

    function setAno_letivo($ano_letivo)
    {
        $this->ano_letivo = filter_var($ano_letivo, FILTER_SANITIZE_STRIPPED);
    }

    function setPeriodo($periodo)
    {
        $this->periodo = filter_var($periodo, FILTER_SANITIZE_STRIPPED);
    }

}
