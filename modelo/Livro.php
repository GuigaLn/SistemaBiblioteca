<?php

class Livro
{

    private $codigo_de_barra;
    private $titulo;
    private $autor;
    private $data_cadastro;
    private $quantidade;
    private $quantidade_locado;
    private $prateleira;
    private $divisoria;

    public function getCodigo_de_barra()
    {
        return $this->codigo_de_barra;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    
    public function getQuantidade_locado()
    {
        return $this->quantidade_locado;
    }

    public function getPrateleira()
    {
        return $this->prateleira;
    }

    public function getDivisoria()
    {
        return $this->divisoria;
    }

    public function setCodigo_de_barra($codigo_de_barra)
    {
        if(is_numeric($codigo_de_barra))
        {
            $this->codigo_de_barra = filter_var($codigo_de_barra, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setTitulo($titulo)
    {
        $this->titulo = filter_var($titulo, FILTER_SANITIZE_STRIPPED);
    }

    public function setAutor($autor)
    {
        $this->autor = filter_var($autor, FILTER_SANITIZE_STRIPPED);
    }

    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = filter_var($data_cadastro, FILTER_SANITIZE_STRIPPED);
    }

    public function setQuantidade($quantidade)
    {
        if(is_numeric($quantidade))
        {
            $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setQuantidade_locado($quantidade_locado)
    {
        if(is_numeric($quantidade_locado))
        {
            $this->quantidade_locado = filter_var($quantidade_locado, FILTER_SANITIZE_STRIPPED);
        }
    }

    public function setPrateleira($prateleira)
    {
        $this->prateleira = filter_var($prateleira, FILTER_SANITIZE_STRIPPED);
    }

    public function setDivisoria($divisoria)
    {
        $this->divisoria = filter_var($divisoria, FILTER_SANITIZE_STRIPPED);
    }
}
