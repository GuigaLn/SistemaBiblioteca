<?php

class Aluno_turma
{

    private $codigo;
    private $codigo_aluno;
    private $codigo_turma;

    public function getCodigo()
    {
        return $this->codigo;
    }
    
    function getCodigo_aluno()
    {
        return $this->codigo_aluno;
    }

    function setCodigo_aluno($codigo_aluno)
    {
        if(is_numeric($codigo_aluno))
        {
            $this->codigo_aluno = filter_var($codigo_aluno, FILTER_SANITIZE_STRIPPED);
        }
    }

    function getCodigo_turma()
    {
        return $this->codigo_turma;
    }

    function setCodigo_turma($codigo_turma)
    {
        if(is_numeric($codigo_turma))
        {
            $this->codigo_turma = filter_var($codigo_turma, FILTER_SANITIZE_STRIPPED);
        }
    }


}
