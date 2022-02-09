<?php

require_once __DIR__ .'../../source/DBConexao.php';

class Aluno_TurmaDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Aluno_turma $aluno_turma, $ano_letivo)
    {
        if($aluno_turma->getCodigo_aluno() != null && $aluno_turma->getCodigo_turma() != null)
        {
			if(self::buscarNome($aluno_turma->getCodigo_aluno(),$aluno_turma->getCodigo_turma(),$ano_letivo)->rowCount())
			{
				$query = self::$conexao->prepare("UPDATE aluno_turma INNER JOIN turma ON aluno_turma.codigo_aluno = ? AND aluno_turma.codigo_turma = turma.codigo AND turma.ano_letivo = ? SET aluno_turma.codigo_turma = ?");
		
				$query->bindValue(1, $aluno_turma->getCodigo_aluno());
				$query->bindValue(2, $ano_letivo);
				$query->bindValue(3, $aluno_turma->getCodigo_turma());
				
				
				if($query->execute()){
					return "200";
				}else{
					return "400";
				}
			} else { 
				$query = self::$conexao->prepare("INSERT INTO aluno_turma (codigo_aluno,codigo_turma) VALUES (?,?)");
				
                $query->bindValue(1, $aluno_turma->getCodigo_aluno());
                $query->bindValue(2, $aluno_turma->getCodigo_turma());
				
				if($query->execute()){
					return "200";
				}else{
					return "400";
				} 
			}
		}else{
			return "400";
		}

	}
	
	//Function Update
	public function alterar(Aluno_turma $aluno_turma){
		if($aluno_turma->getCodigo_aluno() == "" || $aluno_turma->getCodigo_turma() == ""){
            return "Digite Todos Campos";
            exit;
        }
		$query = self::$conexao->prepare("UPDATE aluno_turma SET codigo_turma = ? WHERE codigo_aluno = ? AND status = 'Ativo'");
		
		$query->bindValue(1, $aluno_turma->getCodigo_turma());
		$query->bindValue(2, $aluno_turma->getCodigo_aluno());
		
		if($query->execute()){
			return "Alterado";
		}else{
			return "Erro";
		}
		
	}
	
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM aluno_turma WHERE codigo = ? AND status = 'Ativo'");
		
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
    
    public function buscarNome($codigo_aluno,$codigo_turma,$ano_letivo){

		$query = self::$conexao->prepare("SELECT aluno_turma.codigo,turma.descricao,turma.ano_letivo FROM aluno_turma,turma WHERE codigo_aluno = ? AND turma.ano_letivo = ? AND aluno_turma.codigo_turma = turma.codigo ");

		$query->bindValue(1, $codigo_aluno);
		$query->bindValue(2, $ano_letivo);

        $query->execute();
        
        return $query;
		
	}

	public function retornarTotal($ano_letivo){
		$query = self::$conexao->prepare("SELECT COUNT(*) AS 'quantidade' FROM aluno_turma,turma WHERE aluno_turma.codigo_turma = turma.codigo AND turma.ano_letivo = ?");
		$query->bindValue(1, $ano_letivo);

		$query->execute();
        
        return $query->fetch();
	}

	public function retornarTotalGroupBy($ano_letivo){
		$query = self::$conexao->prepare("SELECT turma.codigo AS 'quantidade' FROM aluno_turma,turma WHERE aluno_turma.codigo_turma = turma.codigo AND turma.ano_letivo = ? GROUP BY aluno_turma.codigo_turma");
		$query->bindValue(1, $ano_letivo);

		$query->execute();
        
        return $query->rowCount();
	}
	
}