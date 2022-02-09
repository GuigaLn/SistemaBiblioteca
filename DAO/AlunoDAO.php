<?php

require_once __DIR__ .'../../source/DBConexao.php';

class AlunoDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Aluno $aluno)
    {
      if($aluno->getNome() != null) {
			if(self::buscarNome($aluno->getNome())->rowCount()) {
				return "409";
			} else { 
				$query = self::$conexao->prepare("INSERT INTO aluno (nome) VALUES (?)");
				
				$query->bindValue(1, $aluno->getNome());
				
				if($query->execute()){
					return "200";
				}else{
					return "400";
				} 
			}
		} else {
			return "400";
		}

	}
	
	//Function Update
	public function alterar(Aluno $aluno){
		if($aluno->getNome() == "" || $aluno->getCodigo() == ""){
            return "400";
            exit;
        }
		$query = self::$conexao->prepare("UPDATE aluno SET nome = ? WHERE codigo = ?");
		
		$query->bindValue(1, $aluno->getNome());
		$query->bindValue(2, $aluno->getCodigo());
		
		if($query->execute()){
			return "200";
		}else{
			return "400";
		}
		
	}
	
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM aluno WHERE codigo = ?");
		
		$query->bindValue(1, $codigo);
		
        $query->execute();
    }
    
	
	//Function Listar
	public function listar(){
		
		$query = self::$conexao->prepare("SELECT codigo, nome, status FROM aluno ORDER BY codigo");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Function Listar
	public function listarSearch($searchTerm){
		
		$query = self::$conexao->prepare("SELECT codigo, nome, status 
		FROM aluno WHERE nome LIKE '%". $searchTerm. "%' ORDER BY codigo LIMIT 100");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Function ListarSelect
	public function listarSelect($searchTerm){
		$query = self::$conexao->prepare("SELECT aluno.codigo, aluno.nome, status 
		FROM aluno WHERE nome LIKE '%". $searchTerm. "%' OR codigo LIKE '". $searchTerm. "%'
    LIMIT 10");
		
		$query->execute();

		$result = $query->fetchAll();

		$json = [];

		foreach($result as $item){
			$json[] = ['id'=>$item['codigo'], 'text'=> $item['codigo'], 'subText' => $item['nome']];
		}
		return $json;
	}

	//Funcion find
	public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT nome FROM aluno WHERE codigo = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetch();		
    } 
    
    public function buscarNome($nome){

		$query = self::$conexao->prepare("SELECT codigo,nome FROM aluno WHERE nome = ? ");

		$query->bindValue(1, $nome);

        $query->execute();
        
        return $query;
		
	}

	public function retornarTotal(){
		$query = self::$conexao->prepare("SELECT COUNT(*) AS 'quantidade' FROM aluno ");

		$query->execute();
        
        return $query->fetch();
	}
	
}