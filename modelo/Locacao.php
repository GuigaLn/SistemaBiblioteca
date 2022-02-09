<?php

class Locacao
{

    private $codigo;
    private $codigo_aluno;
    private $funcionario;
    private $codigo_de_barra;
    private $data_locacao;
    private $data_devolucao;
    private $status;


    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function getCodigo_aluno()
    {
        return $this->codigo_aluno;
    }

    public function getFuncionario()
    {
        return $this->funcionario;
    }

    public function getCodigo_de_barra()
    {
        return $this->codigo_de_barra;
    }

    public function getData_locacao()
    {
        return $this->data_locacao;
    }

    public function getData_devolucao()
    {
        return $this->data_devolucao;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCodigo_aluno($codigo_aluno)
    {
        if(is_numeric($codigo_aluno))
        {
            $this->codigo_aluno = filter_var($codigo_aluno, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setFuncionario($funcionario)
    {
        $this->funcionario = filter_var($funcionario, FILTER_SANITIZE_STRIPPED);
    }

    public function setCodigo_de_barra($codigo_de_barra)
    {
        if(is_numeric($codigo_de_barra))
        {
            $this->codigo_de_barra = filter_var($codigo_de_barra, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setData_locacao($data_locacao)
    {
        $this->data_locacao = filter_var($data_locacao, FILTER_SANITIZE_STRIPPED);
    }

    public function setData_devolucao($data_devolucao)
    {
        $this->data_devolucao = filter_var($data_devolucao, FILTER_SANITIZE_STRIPPED);
    }

    public function setStatus($status)
    {
        $this->status = filter_var($status, FILTER_SANITIZE_STRIPPED);
    }

}
