<?php

require_once __DIR__ .'../../source/DBConexao.php';

class LivroDAO{
	
	private static $conexao;
	
    public function __construct()
    {
		self::$conexao = DBConexao::getInstance();
	}
	
	//Function Insert
    public function inserir(Livro $livro)
    {
        if($livro->getCodigo_de_barra() != null && $livro->getQuantidade() != null)
        {
			if(self::buscarNome($livro->getCodigo_de_barra())->rowCount())
			{
				$query = self::$conexao->prepare("UPDATE livro SET quantidade = (quantidade + ?) WHERE codigo_de_barra = ?");
        
                $query->bindValue(1, $livro->getQuantidade());
				$query->bindValue(2, $livro->getCodigo_de_barra());
				
				if($query->execute()){
                    // 3 = livro adicionado
					return "202";
				}else{
					return "400";
				}
			}else{ 
                if($livro->getCodigo_de_barra() != null && $livro->getTitulo() != null && $livro->getAutor() != null && $livro->getQuantidade() != null && $livro->getPrateleira() != null && $livro->getDivisoria() != null)
                {
                    $query = self::$conexao->prepare("INSERT INTO livro (codigo_de_barra,titulo,autor,quantidade,quantidade_locado,prateleira,divisoria) VALUES (?,?,?,?,0,?,?)");
                    
                    $query->bindValue(1, $livro->getCodigo_de_barra());
                    $query->bindValue(2, $livro->getTitulo());
                    $query->bindValue(3, $livro->getAutor());
                    $query->bindValue(4, $livro->getQuantidade());
                    $query->bindValue(5, $livro->getPrateleira());
                    $query->bindValue(6, $livro->getDivisoria());
                    
                    if($query->execute()){
                        return "200";
                    }else{
                        return "400";
                    } 
                }else{
                    return "400";
                }
			}
		}else{
			return "400";
		}

	}
	
	//Function Update
	public function alterar(Livro $livro,$codigo_de_barra_antigo){
		if($livro->getCodigo_de_barra() == null || $livro->getTitulo() == null || $livro->getAutor() == null || $livro->getQuantidade() == null || $livro->getPrateleira() == null || $livro->getDivisoria() == null || $codigo_de_barra_antigo == null){
            return "400";
            exit;
        }
		if($livro->getCodigo_de_barra() != $codigo_de_barra_antigo){
			$query = self::$conexao->prepare("SELECT codigo_de_barra FROM locacao WHERE codigo_de_barra = ? ");

			$query->bindValue(1, $codigo_de_barra_antigo);

			$query->execute();

			if($query->rowCount()){
				return "409";
				exit;
			}
		} 
			
		$query = self::$conexao->prepare("UPDATE livro SET codigo_de_barra = ?, titulo = ?, autor = ?, quantidade = ?, prateleira = ?, divisoria = ? WHERE codigo_de_barra = ?");
                    
		$query->bindValue(1, $livro->getCodigo_de_barra());
		$query->bindValue(2, $livro->getTitulo());
		$query->bindValue(3, $livro->getAutor());
		$query->bindValue(4, $livro->getQuantidade());
		$query->bindValue(5, $livro->getPrateleira());
		$query->bindValue(6, $livro->getDivisoria());
		$query->bindValue(7, $codigo_de_barra_antigo);
			
		if($query->execute()){
			return "200";
		}else{
			return "409";
		}	
		
	}
	/*
	//Function Delete
	public function deletar($codigo){
		
		$query = self::$conexao->prepare("DELETE FROM aluno_turma WHERE codigo = ? AND status = 'Ativo'");
		
		$query->bindValue(1, $codigo);
		
        $query->execute();
    } */
    
	
	//Function Listar
	public function listar(){
		
		$query = self::$conexao->prepare("SELECT codigo_de_barra, titulo, autor, quantidade, quantidade_locado, prateleira, divisoria FROM livro ORDER BY codigo_de_barra");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Function ListarSelect
	public function listarSelect($searchTerm){
		$query = self::$conexao->prepare("SELECT livro.codigo_de_barra, livro.titulo
		FROM livro WHERE titulo LIKE '%". $searchTerm. "%' OR codigo_de_barra LIKE '". $searchTerm. "%'
    LIMIT 10");
		
		$query->execute();

		$result = $query->fetchAll();

		$json = [];

		foreach($result as $item){
			$json[] = ['id'=>$item['codigo_de_barra'], 'text'=> $item['codigo_de_barra'], 'subText' => $item['titulo']];
		}
		return $json;
	}

	//Function Listar
	public function listarSearch($searchTerm){
		
		$query = self::$conexao->prepare("SELECT codigo_de_barra, titulo, autor, quantidade, quantidade_locado, prateleira, divisoria
		FROM livro WHERE titulo LIKE '%". $searchTerm. "%' OR codigo_de_barra LIKE '". $searchTerm. "%'
		OR autor LIKE '%". $searchTerm. "%'
    LIMIT 10");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	//Funcion find
	public function buscar($codigo){

		$query = self::$conexao->prepare("SELECT codigo_de_barra, titulo, autor, quantidade, quantidade_locado, prateleira, divisoria FROM livro WHERE codigo_de_barra = ? ");

		$query->bindValue(1, $codigo);

		$query->execute();

		return $query->fetch();		
    } 
    
    public function buscarNome($codigo_de_barra){

		$query = self::$conexao->prepare("SELECT codigo_de_barra FROM livro WHERE codigo_de_barra = ? ");

		$query->bindValue(1, $codigo_de_barra);

        $query->execute();
        
        return $query;
		
	}

	public function retornarTotal(){
		$query = self::$conexao->prepare("SELECT SUM(quantidade) AS 'quantidade',SUM(quantidade_locado) AS 'quantidade_locado' FROM livro ");

		$query->execute();
        
        return $query->fetch();
	}

	public function emprestimo($codigo_de_barra){

		$query = self::$conexao->prepare("UPDATE livro SET quantidade_locado = (quantidade_locado+1) WHERE codigo_de_barra = ?");
		
		$query->bindValue(1, $codigo_de_barra);

		
		if($query->execute()){
			return "Alterado";
		}else{
			return "Erro";
		}
		
	}

	public function devolucao($codigo_de_barra){

		$query = self::$conexao->prepare("UPDATE livro SET quantidade_locado = (quantidade_locado-1) 
		
		WHERE codigo_de_barra = ?");
		
		$query->bindValue(1, $codigo_de_barra);

		
		if($query->execute()){
			return "Alterado";
		}else{
			return "Erro";
		}
		
	}
}