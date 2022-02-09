<?php

require_once __DIR__ .'../../DBConexao.php';

class UsuarioDAO{
	
	private static $conexao;
	
	public function __construct(){
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
	public function inserir(Usuario $usuario){
		
		$query = self::$conexao->prepare("INSERT INTO usuario (nome, idade) VALUES(?, ?)");
		
		$query->bindValue(1, $usuario->getNome());
		$query->bindValue(2, $usuario->getIdade());
		
		if($query->execute()){
			return "Inseriu";
		}else{
			return "Erro";
		}

	}
	
	//Function Update
	public function alterar(Usuario $usuario){
		
		$query = self::$conexao->prepare("UPDATE usuario set nome = ?, idade = ? WHERE cod_usu = ?");
		
		$query->bindValue(1, $usuario->getNome());
		$query->bindValue(2, $usuario->getIdade());
		$query->bindValue(3, $usuario->getCodUsu());
		
		if($query->execute()){
			return "Alterado";
		}else{
			return "Erro";
		}
		
	}
	
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM usuario WHERE cod_usu = ?");
		
		$query->bindValue(1, $codigo);
		
		$query->execute();
	}
	
	//Function Listar
	public function listar(){
		
		$query = self::$conexao->prepare("SELECT cod_usu, nome, idade FROM usuario ORDER BY cod_usu");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Funcion Select
	public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT cod_usu, nome, idade FROM usuario WHERE cod_usu = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetch();		
	}
	
}