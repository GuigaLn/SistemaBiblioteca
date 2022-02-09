<?php

require_once __DIR__ .'../../source/DBConexao.php';

class FuncionarioDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Funcionario $funcionario)
    {
        if($funcionario->getNome() != null && $funcionario->getSenha() != null)
        {
			if(self::buscarNome($funcionario->getNome())->rowCount() > 0)
			{
				return "1";
			}else{ 
				$query = self::$conexao->prepare("INSERT INTO funcionario (nome, senha) VALUES(?, ?)");
				
				$query->bindValue(1, $funcionario->getNome());
				$query->bindValue(2, $funcionario->getSenha());
				
				if($query->execute()){
					return "2";
				}else{
					return "0";
				} 
			}
		} else{
			return "0";
		}

	}
	
	//Function Update
	public function alterar(Funcionario $funcionario){
		if($funcionario->getSenha() == "" || $funcionario->getCodigo() == ""){
            return "Digite Todos Campos";
            exit;
		}

		$query = self::$conexao->prepare("UPDATE funcionario SET senha = ? WHERE codigo = ?");
			
		$query->bindValue(1, $funcionario->getSenha());
		$query->bindValue(2, $funcionario->getCodigo());

		if($query->execute()){
			return "Alterado";
		}else{
			return "Erro";
		}
		
	}
	
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM funcionario WHERE codigo = ?");
		
		$query->bindValue(1, $codigo);
		
        $query->execute();
    }
    
	/*
	//Function Listar
	public function listar(){
		
		$query = self::$conexao->prepare("SELECT cod_usu, nome, idade FROM usuario ORDER BY cod_usu");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Funcion find
	public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT cod_usu, nome, idade FROM usuario WHERE cod_usu = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetch();		
    } */
    
    public function buscarNome($nome, $codigo = null){

		$query = self::$conexao->prepare("SELECT codigo,nome FROM funcionario WHERE nome = ?");

		$query->bindValue(1, $nome);

        $query->execute();
        
        return $query;
		
	}
	
}