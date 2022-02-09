<?php

require_once __DIR__ .'../../source/DBConexao.php';

class TurmaDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Turma $turma)
    {
        if($turma->getDescricao() != null && $turma->getAno_letivo() != null && $turma->getPeriodo() != null)
        {
            if(self::buscarNome($turma->getDescricao(),null,$turma->getAno_letivo())->rowCount())
            {
                return "409";
            }else{ 
                $query = self::$conexao->prepare("INSERT INTO turma (descricao,ano_letivo,periodo) VALUES (?,?,?)");
                
                $query->bindValue(1, $turma->getDescricao());
                $query->bindValue(2, $turma->getAno_letivo());
                $query->bindValue(3, $turma->getPeriodo());
                
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
	public function alterar(Turma $turma){
		if($turma->getDescricao() == "" || $turma->getCodigo() == "" || $turma->getAno_letivo() == "" || $turma->getPeriodo() == ""){
            return "400";
            exit;
        }
        if(self::buscarNome($turma->getDescricao(), $turma->getCodigo(),$turma->getAno_letivo())->rowCount())
        {
            return "409";
        }else{ 
            $query = self::$conexao->prepare("UPDATE turma SET descricao = ?, periodo = ? WHERE codigo = ?");
            
            $query->bindValue(1, $turma->getDescricao());
            $query->bindValue(2, $turma->getPeriodo());
            $query->bindValue(3, $turma->getCodigo());
            
            if($query->execute()){
                return "200";
            }else{
                return "400";
            }
        }
		
	}
	
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM turma WHERE codigo = ?");
		
		$query->bindValue(1, $codigo);
		
        $query->execute();
    }
    
	
	//Function Listar
	public function listar($ano_letivo){
		
		$query = self::$conexao->prepare("SELECT codigo, descricao, ano_letivo, periodo FROM turma WHERE ano_letivo = $ano_letivo ORDER BY descricao");
		
		$query->execute();
		
		return $query->fetchAll();
	}

    //Function ListarSelect
	public function listarSelect($searchTerm, $ano_letivo){
		$query = self::$conexao->prepare("SELECT turma.codigo, turma.descricao, turma.periodo FROM turma 
		WHERE ano_letivo = $ano_letivo AND descricao LIKE '%".$search."%' OR periodo LIKE '".$search."%'
		LIMIT 10");
		
		$query->execute();

		$result = $query->fetchAll();

		$json = [];

		foreach($result as $item){
			$json[] = ['id'=>$row['codigo'], 'text'=> $row['descricao'], 'subText' => $row['periodo']];
		}
		return $json;
	}
    
    public function buscarNome($descricao, $codigo = null, $ano_letivo = null){
        if($codigo != null || $ano_letivo != null){
            if($codigo != null && $ano_letivo != null){
                $query = self::$conexao->prepare("SELECT codigo,descricao FROM turma WHERE descricao = ? AND codigo <> $codigo AND ano_letivo = $ano_letivo");
            } else if($codigo != null && $ano_letivo == null){
                $query = self::$conexao->prepare("SELECT codigo,descricao FROM turma WHERE descricao = ? AND codigo <> $codigo");
            } else{
                $query = self::$conexao->prepare("SELECT codigo,descricao FROM turma WHERE descricao = ? AND ano_letivo = $ano_letivo");
            }
            
        }else{ 
            $query = self::$conexao->prepare("SELECT codigo,descricao FROM turma WHERE descricao = ?");
        }
        $query->bindValue(1, $descricao);
        $query->execute();
        
        return $query;
		
    }

    public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT descricao, periodo FROM turma WHERE codigo = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetch();		
    } 

    public function retornarTotal($ano_letivo){
		$query = self::$conexao->prepare("SELECT COUNT(*) AS 'quantidade' FROM turma WHERE ano_letivo = ? ");

        $query->bindValue(1, $ano_letivo);

		$query->execute();
        
        return $query->fetch();
	}
	
}